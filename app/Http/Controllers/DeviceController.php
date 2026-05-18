<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Device;

class DeviceController extends Controller
{
    public function create()
    {
        return view('devices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        auth()->user()->devices()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Device added successfully.');
    }
}
