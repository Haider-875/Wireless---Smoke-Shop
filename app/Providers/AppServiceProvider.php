<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enable Bootstrap 5 pagination for cohesive luxury UI styling
        Paginator::useBootstrapFive();

        // Graceful Database Fallback:
        // If MySQL is configured on localhost / 127.0.0.1 but no MySQL daemon is listening (e.g. on Wasmer, cloud container, or headless server)
        // automatically fallback to SQLite so the application never breaks with SQLSTATE[HY000] [2002] Connection refused.
        try {
            $defaultConn = config('database.default');
            if ($defaultConn === 'mysql') {
                $host = config('database.connections.mysql.host', '127.0.0.1');
                if (in_array($host, ['127.0.0.1', 'localhost'])) {
                    $port = (int)config('database.connections.mysql.port', 3306);
                    $fp = @fsockopen($host, $port, $errno, $errstr, 0.1);
                    if (!$fp) {
                        config(['database.default' => 'sqlite']);
                        config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
                    } else {
                        fclose($fp);
                    }
                }
            }

            if (config('database.default') === 'sqlite') {
                $dbPath = config('database.connections.sqlite.database');
                if (!$dbPath || (!str_contains($dbPath, '.') && !str_contains($dbPath, '/') && !str_contains($dbPath, '\\'))) {
                    $dbPath = database_path('database.sqlite');
                    config(['database.connections.sqlite.database' => $dbPath]);
                }
                if ($dbPath && !file_exists($dbPath) && $dbPath !== ':memory:') {
                    @touch($dbPath);
                }

                // If SQLite is empty or unmigrated (e.g. on fresh Wasmer deploy), auto-migrate and seed
                if (!app()->runningInConsole()) {
                    if (!\Illuminate\Support\Facades\Schema::hasTable('categories')) {
                        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
                    }
                }
            }
        } catch (\Throwable $e) {
            config(['database.default' => 'sqlite']);
            config(['database.connections.sqlite.database' => database_path('database.sqlite')]);
        }
    }
}
