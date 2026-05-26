<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Tip;
use App\Models\Service;

class AdminController extends Controller
{
    private function checkAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }
    }

    public function index()
    {
        $this->checkAdmin();

        $pendingUsers = User::whereIn('role', ['provider', 'expert'])
            ->where('is_validated', false)
            ->get();

        $tips = Tip::with('user')->latest()->get();
        $services = Service::with('user')->latest()->get();
        $allUsers = User::where('id', '!=', auth()->id())->get();
            
        // Statistics Data
        $usageByDate = \App\Models\WaterUsage::selectRaw('DATE(recorded_at) as date, SUM(consumed_liters) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $usageByDevice = \App\Models\WaterUsage::join('devices', 'water_usages.device_id', '=', 'devices.id')
            ->selectRaw('devices.type, SUM(water_usages.consumed_liters) as total')
            ->groupBy('devices.type')
            ->get();

        return view('admin.dashboard', compact('pendingUsers', 'tips', 'services', 'allUsers', 'usageByDate', 'usageByDevice'));
    }

    public function validateUser(User $user)
    {
        $this->checkAdmin();

        $user->update(['is_validated' => true]);
        return redirect()->route('admin.dashboard')->with('success', 'User validated successfully.');
    }

    public function destroyTip(Tip $tip)
    {
        $this->checkAdmin();

        $tip->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Expert tip deleted successfully.');
    }

    public function destroyService(Service $service)
    {
        $this->checkAdmin();

        $service->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Service offering deleted successfully.');
    }

    public function destroyUser(User $user)
    {
        $this->checkAdmin();

        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User account permanently deleted successfully.');
    }
}
