<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $resume = $user->resume;
        $educations = $user->educations;
        $experiences = $user->experiences;

        if ($resume && $educations && $experiences) {
            return view('admin.editResume', compact('resume', 'educations', 'experiences'));
        }

        // If there is no resume associated with the user, show the create view
        return view('admin.resume');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'summary' => 'required|string|max:1000',
            'education_title.*' => 'required|string|max:255',
            'education_year.*' => 'required|string|max:255',
            'education_university.*' => 'required|string|max:255',
            'education_description.*' => 'required|string|max:1000',
            'experience_title.*' => 'required|string|max:255',
            'experience_start_year.*' => 'required|string|max:255',
            'experience_end_year.*' => 'required|string|max:255',
            'experience_company.*' => 'required|string|max:255',
            'experience_description.*' => 'required|string|max:1000',
        ]);

        $data = $request->all();

        // Store User Information and Resume Summary
        $user = [
            'address' => $data['address'],
        ];

        $user = Auth::user();

        // Check if the user already has a resume
        if ($user->resume) {
            return redirect()->route('resume.edit', $user->resume)->with('info', 'You already have a resume. You can edit it here.');
        }

        $resume = Resume::create([
            'summary' => $data['summary'],
            'address' => $data['address'],
            'user_id' => $user->id,
        ]);

        // Store Education Details
        foreach ($data['education_title'] as $index => $title) {
            Education::create([
                'title' => $title,
                'year_of_graduate' => $data['education_year'][$index],
                'university' => $data['education_university'][$index],
                'description' => $data['education_description'][$index],
                'user_id' => $user->id,
            ]);
        }

        // Store Experience Details
        foreach ($data['experience_title'] as $index => $title) {
            Experience::create([
                'job_title' => $title,
                'start_year' => $data['experience_start_year'][$index],
                'end_year' => $data['experience_end_year'][$index],
                'company' => $data['experience_company'][$index],
                'description' => $data['experience_description'][$index],
                'user_id' => $user->id,
            ]);
        }

        $user->resume_id = $resume->id;
        $user->save();

        // Optionally, you can redirect the user to a success page or any other page after storing the data.
        return redirect()->route('resume.index')->with('success', 'Resume submitted successfully!');

    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function edit(Resume $resume)
    {

        // Check if the resume belongs to the currently authenticated user
        if ($resume->user_id !== auth()->user()->id) {
            return redirect()->route('resume.index')->with('error', 'You are not authorized to edit this resume.');
        }

        // Fetch the education and experience details for the resume
        $educations = $resume->educations;
        $experiences = $resume->experiences;

        // You can pass the resume, educations, and experiences to the view
        return view('admin.editResume', compact('resume', 'educations', 'experiences'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'summary' => 'required|string|max:1000',
            'education_title.*' => 'required|string|max:255',
            'education_year.*' => 'required|string|max:255',
            'education_university.*' => 'required|string|max:255',
            'education_description.*' => 'required|string|max:1000',
            'experience_title.*' => 'required|string|max:255',
            'experience_start_year.*' => 'required|string|max:255',
            'experience_end_year.*' => 'required|string|max:255',
            'experience_company.*' => 'required|string|max:255',
            'experience_description.*' => 'required|string|max:1000',
        ]);

        $data = $request->all();

        $user = Auth::user();
        $resume = $user->resume;

        // Check if the user already has a resume
        if (!$resume) {
            return redirect()->route('resume.index')->with('error', 'You do not have a resume to update.');
        }

        // Update Resume Summary and Address
        $resume->update([
            'summary' => $data['summary'],
            'address' => $data['address'],
        ]);

        // Update Education Details
        foreach ($data['education_title'] as $index => $title) {
            $education = $user->educations->get($index);

            // Check if the education record belongs to the user
            if (!$education) {
                return redirect()->route('resume.index')->with('error', 'You are not authorized to edit this education record.');
            }

            $education->update([
                'title' => $title,
                'year_of_graduate' => $data['education_year'][$index],
                'university' => $data['education_university'][$index],
                'description' => $data['education_description'][$index],
            ]);
        }

        // Update Experience Details
        foreach ($data['experience_title'] as $index => $title) {
            $experience = $user->experiences->get($index);

            // Check if the experience record belongs to the user
            if (!$experience) {
                return redirect()->route('resume.index')->with('error', 'You are not authorized to edit this experience record.');
            }

            $experience->update([
                'job_title' => $title,
                'start_year' => $data['experience_start_year'][$index],
                'end_year' => $data['experience_end_year'][$index],
                'company' => $data['experience_company'][$index],
                'description' => $data['experience_description'][$index],
            ]);
        }

        // Optionally, you can redirect the user to a success page or any other page after updating the data.
        return redirect()->route('resume.index')->with('success', 'Resume updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
