<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Device;
use App\Models\WaterUsage;

class WaterUsageController extends Controller
{
    public function create()
    {
        $devices = auth()->user()->devices;
        return view('usages.create', compact('devices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'device_id' => 'required|exists:devices,id',
            'consumed_liters' => 'required|numeric|min:0.01',
            'recorded_at' => 'required|date',
        ]);

        $device = auth()->user()->devices()->findOrFail($validated['device_id']);

        $device->waterUsages()->create([
            'consumed_liters' => $validated['consumed_liters'],
            'recorded_at' => $validated['recorded_at'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Water usage logged successfully!');
    }
}
