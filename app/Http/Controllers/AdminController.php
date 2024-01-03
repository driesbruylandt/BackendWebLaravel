<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function showPromoteForm()
    {
        return view('admin.promote');
    }

    public function promoteUser(Request $request)
    {
        $username = $request->input('username');

        // Find the user by username
        $user = User::where('name', $username)->first();

        if (!$user) {
            return redirect()->route('admin.promote.form')
                ->with('error', 'User not found.');
        }

        // Check if the authenticated user has the authority to promote users
        if (auth()->user()->is_admin) {
            // Promote the user to admin
            $user->update(['is_admin' => 1]);

            return redirect()->route('admin.promote.form')
                ->with('success', 'User promoted to admin successfully.');
        }

        return redirect()->route('admin.promote.form')
            ->with('error', 'You do not have the authority to perform this action.');
    }
}
