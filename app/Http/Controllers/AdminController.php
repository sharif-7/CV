<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function show($id)
    {
        // Retrieve the user based on the given name
        $user = Auth::user();
        $about = $user->about;
        $resume = $user->resume;
        $educations = $user->educations;
        $experiences = $user->experiences;
        $categories = $user->categories;
        $portfolios = $user->portfolios;
        if ($user) {
            // You can pass the user data to the view or perform any other actions here
            return view('show', compact('about', 'resume', 'educations', 'experiences', 'categories', 'portfolios'));
        } else {
            // Handle the case when the user is not found
            abort(404);
        }
    }

}
