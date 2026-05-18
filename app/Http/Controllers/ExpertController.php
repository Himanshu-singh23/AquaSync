<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tip;

class ExpertController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== 'expert' || !$user->is_validated) {
            abort(403, 'Unauthorized access or awaiting admin approval.');
        }

        $tips = Tip::latest()->get();
        return view('experts.dashboard', compact('tips'));
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->role !== 'expert' || !$user->is_validated) {
            abort(403, 'Unauthorized');
        }
        return view('experts.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->role !== 'expert' || !$user->is_validated) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'location_tag' => 'nullable|string|max:255',
        ]);

        $user->tips()->create($validated);

        return redirect()->route('expert.dashboard')->with('success', 'Conservation tip published successfully!');
    }

    public function destroy(Tip $tip)
    {
        $user = auth()->user();
        if ($user->role !== 'expert' || !$user->is_validated) {
            abort(403, 'Unauthorized');
        }

        if ($tip->user_id !== $user->id) {
            abort(403, 'You can only delete your own tips.');
        }

        $tip->delete();

        return redirect()->route('expert.dashboard')->with('success', 'Conservation tip deleted successfully!');
    }
}
