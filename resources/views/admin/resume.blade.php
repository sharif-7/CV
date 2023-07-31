@extends('admin.layouts.app')

@section('header')
    @include('admin.partials.header')
@endsection

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

{{--resume.store--}}
@section('main')
    <div class="container">
        <h1>Resume Form</h1>
        <form action="{{ route('resume.store') }}" method="POST">
            @csrf


            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>

            {{-- Resume Summary --}}
            <div class="mb-3">
                <label for="summary" class="form-label">Summary:</label>
                <textarea name="summary" id="summary" rows="4" class="form-control"></textarea>
            </div>

            {{-- Education Details --}}
            <h2>Education</h2>
            <div id="education-section">
                <div class="education-fields">
                    @php $educationCount = 1; @endphp
                    <div class="mb-3">
                        <label class="form-label">Title {{ $educationCount }}:</label>
                        <input type="text" name="education_title[]" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Year of Graduate:</label>
                        <input type="text" name="education_year[]" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">University/Institution:</label>
                        <input type="text" name="education_university[]" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea name="education_description[]" rows="3" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="add-education">Add Education</button>

            {{-- Experience Details --}}
            <div class="mt-3">
                <h2>Experience</h2>
            </div>
            <div id="experience-section">
                <div class="experience-fields">
                    @php $experienceCount = 1; @endphp
                    <div class="mb-3">
                        <label class="form-label">Job Title {{ $experienceCount }}:</label>
                        <input type="text" name="experience_title[]" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Start Year:</label>
                        <input type="text" name="experience_start_year[]" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">End Year:</label>
                        <input type="text" name="experience_end_year[]" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company:</label>
                        <input type="text" name="experience_company[]" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description:</label>
                        <textarea name="experience_description[]" rows="3" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="add-experience">Add Experience</button>

            {{-- Submit Button --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-education').addEventListener('click', function () {
            const educationFields = document.querySelector('#education-section .education-fields');
            const clone = educationFields.cloneNode(true);
            const count = document.querySelectorAll('.education-fields').length + 1;
            clone.querySelectorAll('.form-label')[0].textContent = `Title ${count}:`;
            document.querySelector('#education-section').appendChild(clone);
        });

        document.getElementById('add-experience').addEventListener('click', function () {
            const experienceFields = document.querySelector('#experience-section .experience-fields');
            const clone = experienceFields.cloneNode(true);
            const count = document.querySelectorAll('.experience-fields').length + 1;
            clone.querySelectorAll('.form-label')[0].textContent = `Job Title ${count}:`;
            document.querySelector('#experience-section').appendChild(clone);
        });


    </script>

@endsection
