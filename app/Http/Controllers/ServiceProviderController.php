<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\User;

class ServiceProviderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== 'provider' || !$user->is_validated) {
            abort(403, 'Unauthorized access or awaiting admin approval.');
        }

        $services = $user->services;
        return view('providers.dashboard', compact('services'));
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->role !== 'provider' || !$user->is_validated) {
            abort(403, 'Unauthorized access or awaiting admin approval.');
        }
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== 'provider' || !$user->is_validated) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
        ]);

        $user->services()->create($validated);

        return redirect()->route('provider.dashboard')->with('success', 'Service added successfully!');
    }

    public function catalog()
    {
        $providers = User::where('role', 'provider')
            ->where('is_validated', true)
            ->with('services')
            ->get();

        return view('services.index', compact('providers'));
    }

    public function destroy(Service $service)
    {
        $user = auth()->user();
        if ($user->role !== 'provider' || !$user->is_validated) {
            abort(403, 'Unauthorized');
        }

        if ($service->user_id !== $user->id) {
            abort(403, 'You can only delete your own services.');
        }

        $service->delete();

        return redirect()->route('provider.dashboard')->with('success', 'Service offering deleted successfully!');
    }
}
