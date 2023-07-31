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
        <h1>Edit Resume</h1>

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Info Message --}}
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <h1>Resume Form</h1>
        <form action="{{ route('resume.update', $resume) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- User Information --}}
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" id="address" class="form-control"
                       value="{{ old('address', $resume->address) }}">
            </div>

            {{-- Resume Summary --}}
            <div class="mb-3">
                <label for="summary" class="form-label">Summary:</label>
                <textarea name="summary" id="summary" rows="4"
                          class="form-control">{{ old('summary', $resume->summary) }}</textarea>
            </div>

            {{-- Education Details --}}
            <h2>Education</h2>
            <div id="education-section">
                @foreach($educations as $index => $education)
                    <div class="education-fields mb-4">
                        <div class="mb-3">
                            <label class="form-label">Title {{ $index + 1 }}:</label>
                            <input type="text" name="education_title[]" class="form-control"
                                   value="{{ old('education_title.'.$index, $education->title) }}">
                            @error('education_title.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Year of Graduate:</label>
                            <input type="text" name="education_year[]" class="form-control"
                                   value="{{ old('education_year.'.$index, $education->year_of_graduate) }}">
                            @error('education_year.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">University/Institution:</label>
                            <input type="text" name="education_university[]" class="form-control"
                                   value="{{ old('education_university.'.$index, $education->university) }}">
                            @error('education_university.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <textarea name="education_description[]" rows="3"
                                      class="form-control">{{ old('education_description.'.$index, $education->description) }}</textarea>
                            @error('education_description.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Add Education Button --}}
            <button type="button" class="btn btn-primary" id="add-education">Add Education</button>

            {{-- Experience Details --}}
            <h2>Experience</h2>
            <div id="experience-section">
                @foreach($experiences as $index => $experience)
                    <div class="experience-fields mb-4">
                        <div class="mb-3">
                            <label class="form-label">Job Title {{ $index + 1 }}:</label>
                            <input type="text" name="experience_title[]" class="form-control"
                                   value="{{ old('experience_title.'.$index, $experience->job_title) }}">
                            @error('experience_title.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Start Year:</label>
                            <input type="text" name="experience_start_year[]" class="form-control"
                                   value="{{ old('experience_start_year.'.$index, $experience->start_year) }}">
                            @error('experience_start_year.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">End Year:</label>
                            <input type="text" name="experience_end_year[]" class="form-control"
                                   value="{{ old('experience_end_year.'.$index, $experience->end_year) }}">
                            @error('experience_end_year.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company:</label>
                            <input type="text" name="experience_company[]" class="form-control"
                                   value="{{ old('experience_company.'.$index, $experience->company) }}">
                            @error('experience_company.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <textarea name="experience_description[]" rows="3"
                                      class="form-control">{{ old('experience_description.'.$index, $experience->description) }}</textarea>
                            @error('experience_description.'.$index)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Add Experience Button --}}
            <button type="button" class="btn btn-primary" id="add-experience">Add Experience</button>

            {{-- Submit Button --}}
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
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
