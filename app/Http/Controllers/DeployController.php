<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DeployController extends Controller
{
    /**
     * Web-based deployment runner for production environments without terminal/SSH access.
     * Protected by timing-safe secret key verification and throttle rate limiting.
     */
    public function migrate(Request $request): Response
    {
        // 1. Enforce Timing-Safe Secret Key Authorization
        $configuredKey = env('DEPLOY_KEY', 'BugsDeploy2026SecretKey!');
        $providedKey = (string)$request->query('key');

        if (empty($providedKey) || !hash_equals($configuredKey, $providedKey)) {
            abort(403, 'Access Denied: Invalid or missing ?key= parameter.');
        }

        $logs = [];
        $startTime = microtime(true);

        // 2. Run Database Migrations (--force required for production)
        try {
            $exitCode = Artisan::call('migrate', ['--force' => true]);
            $logs[] = [
                'task' => 'Database Migrations (php artisan migrate --force)',
                'status' => $exitCode === 0 ? 'SUCCESS' : 'WARNING',
                'output' => Artisan::output(),
            ];
        } catch (\Throwable $e) {
            $logs[] = [
                'task' => 'Database Migrations',
                'status' => 'ERROR',
                'output' => $e->getMessage(),
            ];
        }

        // 3. Seed Smartphone Counter Products & Category
        try {
            $exitCode = Artisan::call('db:seed', [
                '--class' => 'Database\\Seeders\\PhoneProductsSeeder',
                '--force' => true,
            ]);
            $logs[] = [
                'task' => 'Seed Smartphone Showcase & Categories (PhoneProductsSeeder)',
                'status' => $exitCode === 0 ? 'SUCCESS' : 'WARNING',
                'output' => Artisan::output() ?: 'Smartphones category and 6 counter display products synced.',
            ];
        } catch (\Throwable $e) {
            $logs[] = [
                'task' => 'Seed Smartphone Showcase',
                'status' => 'ERROR',
                'output' => $e->getMessage(),
            ];
        }

        // 4. Seed Super Administrator Account
        try {
            $exitCode = Artisan::call('db:seed', [
                '--class' => 'Database\\Seeders\\SuperAdminSeeder',
                '--force' => true,
            ]);
            $logs[] = [
                'task' => 'Seed Super Administrator (SuperAdminSeeder)',
                'status' => $exitCode === 0 ? 'SUCCESS' : 'WARNING',
                'output' => Artisan::output() ?: 'Super Admin (superadmin@bugswireless.com) created with full rights.',
            ];
        } catch (\Throwable $e) {
            $logs[] = [
                'task' => 'Seed Super Administrator',
                'status' => 'ERROR',
                'output' => $e->getMessage(),
            ];
        }

        // 5. Clear / Refresh Caches if requested (?clear=1) or by default
        if ($request->boolean('clear', true)) {
            try {
                Artisan::call('optimize:clear');
                $logs[] = [
                    'task' => 'Cache Refresh (config, route, view, cache)',
                    'status' => 'SUCCESS',
                    'output' => Artisan::output(),
                ];
            } catch (\Throwable $e) {
                $logs[] = [
                    'task' => 'Cache Refresh',
                    'status' => 'SKIPPED',
                    'output' => $e->getMessage(),
                ];
            }
        }

        $duration = round(microtime(true) - $startTime, 3);
        $totalProducts = Product::count();
        $totalUsers = User::count();

        // 6. Render High-Contrast Luxury Dark Console UI
        $html = view('pages.deploy.console', compact('logs', 'duration', 'totalProducts', 'totalUsers'))->render();

        return response($html, 200)->header('Content-Type', 'text/html');
    }
}

