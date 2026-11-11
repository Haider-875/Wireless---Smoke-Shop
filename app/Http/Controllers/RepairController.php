<?php

namespace App\Http\Controllers;

use App\Models\RepairInquiry;
use App\Http\Requests\RepairQuoteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RepairController extends Controller
{
    /**
     * Display the repairs page.
     */
    public function index(): View
    {
        $services = [
            [
                'icon' => 'bi-phone',
                'title' => 'Screen & glass replacement',
                'body' => 'Cracked front glass, dead touch or lines across the display — we swap the panel and test every corner.'
            ],
            [
                'icon' => 'bi-battery-charging',
                'title' => 'Battery replacement',
                'body' => 'Charging twice a day or shutting off at 30%? A fresh cell gets you back to a full day.'
            ],
            [
                'icon' => 'bi-plugin',
                'title' => 'Charging port repair',
                'body' => 'Cable falls out or only charges at an angle — cleaned, reflowed or replaced on the spot.'
            ],
            [
                'icon' => 'bi-droplet-half',
                'title' => 'Liquid damage service',
                'body' => 'Dropped it in water? We open, clean and assess before you spend anything on parts.'
            ],
            [
                'icon' => 'bi-arrow-repeat',
                'title' => 'Data transfer & backup',
                'body' => 'Photos, contacts and messages moved across to your new phone, verified before you leave.'
            ],
            [
                'icon' => 'bi-broadcast-pin',
                'title' => 'Carrier activation',
                'body' => 'Prepaid and postpaid activations, SIM swaps and number ports, done in store.'
            ],
        ];

        $steps = [
            [
                'number' => '01',
                'title' => 'Bring it in',
                'body' => 'No appointment. Bring the phone and, if you have it, the charger.'
            ],
            [
                'number' => '02',
                'title' => 'Free quote',
                'body' => 'We diagnose in front of you and quote the repair before opening anything.'
            ],
            [
                'number' => '03',
                'title' => 'Same-day fix',
                'body' => 'Most screen and battery jobs are done within the hour. We test, then hand it back.'
            ],
        ];

        return view('pages.repairs', compact('services', 'steps'));
    }

    /**
     * Store a repair quote inquiry in the database.
     */
    public function storeQuote(RepairQuoteRequest $request): JsonResponse|RedirectResponse
    {
        $inquiry = RepairInquiry::create($request->validated());

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! We received your repair quote request. We will contact you shortly.',
                'inquiry' => $inquiry
            ], 201);
        }

        return redirect()->route('repairs')->with('success', 'Thank you! We received your repair quote request. We will contact you shortly.');
    }
}
