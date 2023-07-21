@extends('admin.layouts.app')

@section('header')
    @include('admin.partials.header')
@endsection

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('main')
    <div class="pagetitle">
        <h1>About</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome</h5>
                        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">What is your name?</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>

                            <!-- Describe -->
                            <div class="row mb-3">
                                <label for="describe" class="col-sm-3 col-form-label">How do you describe
                                    yourself?</label>
                                <div class="col-sm-9">
                                    <input type="text" id="describe" name="describe"
                                           placeholder="Write your most important properties and separate with comma. (I'm ...)"
                                           class="form-control">
                                </div>
                            </div>

                            <!-- Social Media Links -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Social Media Links</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input type="text" id="facebook" name="facebook" class="form-control"
                                                   placeholder="Facebook URL">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="twitter" class="form-label">Twitter</label>
                                            <input type="text" id="twitter" name="twitter" class="form-control"
                                                   placeholder="Twitter URL">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input type="text" id="instagram" name="instagram" class="form-control"
                                                   placeholder="Instagram URL">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="linkedin" class="form-label">LinkedIn</label>
                                            <input type="text" id="linkedin" name="linkedin" class="form-control"
                                                   placeholder="LinkedIn URL">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="github" class="form-label">GitHub</label>
                                            <input type="text" id="github" name="github" class="form-control"
                                                   placeholder="GitHub URL">
                                        </div>
                                        <!-- Add more social media platforms as needed -->
                                    </div>
                                </div>
                            </div>

                            <!-- Hero Picture -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Hero Picture (1920*1280)</label>
                                <div class="col-sm-9">
                                    <input type="file" id="hero_picture" name="hero_picture" class="form-control">
                                </div>
                            </div>

                            <!-- Profile Picture -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Profile Picture (600*600)</label>
                                <div class="col-sm-9">
                                    <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                                </div>
                            </div>

                            <!-- Job Title -->
                            <div class="row mb-3">
                                <label for="job_title" class="col-sm-3 col-form-label">Job Title</label>
                                <div class="col-sm-9">
                                    <input type="text" id="job_title" name="job_title" class="form-control">
                                </div>
                            </div>

                            <!-- Birthday -->
                            <div class="row mb-3">
                                <label for="birthday" class="col-sm-3 col-form-label">Birthday</label>
                                <div class="col-sm-9">
                                    <input type="date" id="birthday" name="birthday" class="form-control">
                                </div>
                            </div>

                            <!-- Website -->
                            <div class="row mb-3">
                                <label for="website" class="col-sm-3 col-form-label">Website</label>
                                <div class="col-sm-9">
                                    <input type="text" id="website" name="website" class="form-control">
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>
                            </div>

                            <!-- City -->
                            <div class="row mb-3">
                                <label for="city" class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <input type="text" id="city" name="city" class="form-control">
                                </div>
                            </div>

                            <!-- Age -->
                            <div class="row mb-3">
                                <label for="age" class="col-sm-3 col-form-label">Age</label>
                                <div class="col-sm-9">
                                    <input type="number" id="age" name="age" class="form-control">
                                </div>
                            </div>

                            <!-- Degree -->
                            <div class="row mb-3">
                                <label for="degree" class="col-sm-3 col-form-label">Degree</label>
                                <div class="col-sm-9">
                                    <input type="text" id="degree" name="degree" class="form-control">
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>

                            <!-- Freelance (Available or Not) -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Freelance (Available or Not)</label>
                                <div class="col-sm-9">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="freelance" name="freelance">
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row mb-3">
                                <label for="description" class="col-sm-3 col-form-label">Description (up to 600
                                    characters)</label>
                                <div class="col-sm-9">
                                    <textarea id="description" name="description" class="form-control" maxlength="600"
                                              rows="4"></textarea>
                                </div>
                            </div>

                            <!-- Skills Section -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Skills</label>
                                <div class="col-sm-9">
                                    <div id="skillList">
                                        <!-- Skill Row Template -->
                                        <div class="row mb-2 skill-row">
                                            <div class="col-md-5">
                                                <input type="text" name="skill_name[]" class="form-control"
                                                       placeholder="Skill Name">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="range" name="skill_level[]" class="form-range" min="1"
                                                       max="100" value="50">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="removeSkill(this)">Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-2" onclick="addSkill()">Add Skill
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </form>

                        <script>
                            function addSkill() {
                                var skillRowTemplate = document.querySelector('.skill-row');
                                var skillRowClone = skillRowTemplate.cloneNode(true);
                                var skillList = document.getElementById('skillList');
                                skillList.appendChild(skillRowClone);
                            }

                            function removeSkill(button) {
                                var skillList = document.getElementById('skillList');
                                if (skillList.children.length > 1) {
                                    var skillRow = button.parentElement.parentElement;
                                    skillList.removeChild(skillRow);
                                }
                            }
                        </script>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
