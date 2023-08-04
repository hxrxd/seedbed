<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Mesa;

use Auth;

class UserController extends Controller
{
    /**
     * List all users to be managed by Admins
     */
    public function getUsers(Request $request): View
    {
        // fetch departments
        $rolles = User::distinct()->pluck('rol');

        // Get the users with roll Admin, Voluntario and Coordinator
        $data = User::whereNotIn('rol',['Fiscal'])->get();

        return view('users.admin-users', compact('data','rolles'));
    }

    /**
     * Display the users' profile form.
     */
    public function editUser($email): View
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            abort(404);
        }

        // fetch departments
        $departments = Mesa::distinct()->pluck('departamento');

        // fetch rolles
        $rolles = User::distinct()->pluck('rol');

        if(Auth::user()->rol === 'Admin') {
            return view('users.admin-users-edit', compact('user','rolles','departments'));
        } else {
            return view('dashboard');
        }
        
    }

    /**
     * Update the user info
     */
    public function updateUser(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();

        if ($user !== null) {
            User::where('email', $request->input('email'))->update([
                'rol' => $request->input('rol'),
                'location' => $request->input('location'),
            ]);
        } 

        if(Auth::user()->rol === 'Admin') {
            $redirectUrl = url('admin/users');
        } else {
            $redirectUrl = url('/dashboard');
        }
        
        return response()->json(['redirect_url' => $redirectUrl]);
    }
}
