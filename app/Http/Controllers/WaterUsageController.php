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
        $user = auth()->user();
        $devices = $user->devices;
        
        $totalUsage = $devices->flatMap->waterUsages->sum('consumed_liters');
        $currentGoal = $user->goals()->where('month_year', date('m-Y'))->first();

        return view('usages.create', compact('devices', 'totalUsage', 'currentGoal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'device_id' => 'required|exists:devices,id',
            'consumed_liters' => 'required|numeric|min:0.01',
            'recorded_at' => 'required|date',
        ]);

        $user = auth()->user();
        $device = $user->devices()->findOrFail($validated['device_id']);

        $device->waterUsages()->create([
            'consumed_liters' => $validated['consumed_liters'],
            'recorded_at' => $validated['recorded_at'],
        ]);

        $devices = $user->devices()->with('waterUsages')->get();
        $totalUsage = $devices->flatMap->waterUsages->sum('consumed_liters');
        $currentGoal = $user->goals()->where('month_year', date('m-Y'))->first();

        if ($currentGoal && $currentGoal->target_liters_per_month > 0 && $totalUsage > $currentGoal->target_liters_per_month) {
            return redirect()->route('dashboard')->with('warning', 'Water usage logged! However, you have exceeded your monthly goal. Please consider adjusting your goal.');
        }

        return redirect()->route('dashboard')->with('success', 'Water usage logged successfully!');
    }
}
