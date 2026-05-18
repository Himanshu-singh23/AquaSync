<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    /**
     * Store a new monthly goal for the authenticated user.
     */
    public function store(Request $request)
    {
        $request->validate([
            'target_liters_per_month' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();

        // Create or update goal for the current month/year
        $goal = Goal::updateOrCreate(
            [
                'user_id'   => $user->id,
                'month_year'=> date('m-Y'),
            ],
            [
                'target_liters_per_month' => $request->input('target_liters_per_month'),
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Monthly goal updated successfully.');
    }
}
