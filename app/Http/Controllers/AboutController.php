<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            'name' => 'required|string|max:255',
            'describe' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'hero_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'job_title' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'website' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'degree' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'freelance' => 'nullable',
            'description' => 'nullable|string|max:600',
            'skill_name' => 'array', // This will be an array of skill names
            'skill_level' => 'array', // This will be an array of skill levels
            // Add any other validation rules as needed for new fields
        ]);
        // Handle file uploads (hero_picture and profile_picture)
        $data['hero_picture'] = $this->storeImage($request->hero_picture, 'images', 'hero');
        $data['profile_picture'] = $this->storeImage($request->profile_picture, 'images', 'profile');

        $data['user_id'] = Auth::id();

        // Store the about information in the database
        $about = About::create($data);

        // Handle skills (if provided)
        if ($request->filled('skill_name') && $request->filled('skill_level')) {
            $skills = array_combine($request->input('skill_name'), $request->input('skill_level'));
            // The $skills array will be an associative array with skill_name as keys and skill_level as values.

            // You can choose to store the skills in a separate table if needed, or any other custom logic.
            // For this example, let's just store the skills as a JSON string in the "about" table.
            $about->skills = json_encode($skills);
            $about->save();
        }

        // You can add any additional logic or redirects here as needed.
        return redirect()->route('about.index')->with('success', 'About information saved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     */

    private function storeImage($image, $folder, $namePrefix): ?string
    {
        if ($image) {
            $imageName = $namePrefix . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($folder), $imageName);
            return '/' . $folder . '/' . $imageName;
        }

        return null;
    }

    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
