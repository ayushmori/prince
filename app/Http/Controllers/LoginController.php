<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|boolean',
        ]);

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            return $this->authenticated($request, Auth::user());
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function authenticated(Request $request, $user)
    {
        // Check if the user is an admin
        if ($user->isAdmin()) {
            // Redirect to the admin dashboard if the user is an admin
            return redirect()->route('admin.dashboard');
        }

        // Redirect to the frontend page for regular users
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
