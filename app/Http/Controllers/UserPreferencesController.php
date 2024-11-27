<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserPreferencesController extends Controller
{
    public function updatePreferences(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->with('error', 'User not authenticated.');
        }

        $request->validate([
            'level' => 'sometimes|nullable|in:bronze,silver,gold',
            'location' => 'sometimes|nullable|string',
            'type' => 'sometimes|nullable|string',
            'max_price' => 'sometimes|nullable|numeric|min:0',
            'min_duration' => 'sometimes|nullable|numeric|min:0',
        ]);

        try {
            $user->update([
                'level' => $request->input('level'),
                'location' => $request->input('location'),
                'type' => $request->input('type'),
                'max_price' => $request->input('max_price'),
                'min_duration' => $request->input('min_duration'),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating your preferences.');
        }

        return redirect()->route('recommendations')->with('success', 'Preferences updated successfully.');
    }
}