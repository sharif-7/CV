<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;

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
        $user = User::findOrFail($id);
        $about = $user->about;
        $resume = $user->resume;
        $educations = $user->educations;
        $experiences = $user->experiences;
        if ($user) {
            // You can pass the user data to the view or perform any other actions here
            return view('show', compact('about', 'resume', 'educations', 'experiences'));
        } else {
            // Handle the case when the user is not found
            abort(404);
        }
    }

}
