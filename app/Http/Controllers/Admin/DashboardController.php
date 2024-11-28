<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::check() && !Auth::user()->isAdmin()) {
                return redirect()->route('home'); // Redirect non-admin users to home
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Admin dashboard view
        return view('admin.dashboard');
    }
}
