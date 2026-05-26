<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Device;
use App\Models\WaterUsage;
use App\Models\Goal;
use App\Models\Tip;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $devices = $user->devices()->with('waterUsages')->get();
        $totalUsage = $devices->flatMap->waterUsages->sum('consumed_liters');
        $currentGoal = $user->goals()->where('month_year', date('m-Y'))->first();
        $tips = Tip::inRandomOrder()->take(3)->get();
        
        $usageByDate = \App\Models\WaterUsage::whereIn('device_id', $devices->pluck('id'))
            ->selectRaw('DATE(recorded_at) as date, SUM(consumed_liters) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        
        return view('dashboard', compact('devices', 'totalUsage', 'currentGoal', 'tips', 'usageByDate'));
    }
}
