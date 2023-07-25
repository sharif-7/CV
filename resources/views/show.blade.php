@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('header')
    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="{{ asset($about->profile_picture) }}" id="profile-image" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html">{{ $about->name }}</a></h1>
                <div class="social-links mt-3 text-center">
                    <a href="{{ $about->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="{{ $about->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="{{ $about->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="{{ $about->github }}" class="github"><i class="bx bxl-github"></i></a>
                    <a href="{{ $about->linkedin }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i>
                            <span>Home</span></a>
                    </li>
                    <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a>
                    </li>
                    <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a>
                    </li>
                    <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i>
                            <span>Portfolio</span></a></li>
                    <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a>
                    </li>
                    <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a>
                    </li>
                    <li><a href="login" class="nav-link"><i class="bx bx-pencil"></i> <span>Admin Panel</span></a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->
@endsection

@section('hero')
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center"
             style="background-image: url('{{ asset($about->hero_picture) }}')">
        <div class="hero-container" data-aos="fade-in">
            <h1>{{ $about->name }}</h1>
            <p>I'm <span class="typed" data-typed-items="{{ $about->describe }}"></span></p>
        </div>
    </section>
@endsection

@section('about')
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>About</h2>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right">
                    <img src="{{ asset($about->profile_picture) }}" class="img-fluid about-image" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                    <h3>{{ $about->job_title }}</h3>

                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong>
                                    <span>{{ Carbon::parse($about->birthday)->format('d M Y') }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                    <span>{{ $about->website }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                    <span>{{ $about->phone }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong>
                                    <span>{{ $about->city }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>
                                    <span>{{ $about->age }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                    <span>{{ $about->degree }}</span>
                                </li>
                                <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong>
                                    <span>{{ $about->email }}</span></li>
                                <li>
                                    <i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                    <span>{{ $about->freelance ? 'Available' : 'Not Available' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        {{ $about->description }}
                    </p>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('skills')
    <section id="skills" class="skills section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Skills</h2>
            </div>

            <div class="row skills-content">
                <div class="col-lg-6" data-aos="fade-up">
                    @php
                        $skills = json_decode($about->skills, true);
                        $skillCount = count($skills);
                        $firstHalf = array_slice($skills, 0, ceil($skillCount / 2));
                    @endphp

                    @foreach ($firstHalf as $skill => $level)
                        <div class="progress">
                            <span class="skill">{{ $skill }} <i class="val">{{ $level }}%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $level }}"
                                     aria-valuemin="0" aria-valuemax="100" style="width: {{ $level }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-6" data-aos="fade-up">
                    @php
                        $secondHalf = array_slice($skills, ceil($skillCount / 2));
                    @endphp

                    @foreach ($secondHalf as $skill => $level)
                        <div class="progress">
                            <span class="skill">{{ $skill }} <i class="val">{{ $level }}%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $level }}"
                                     aria-valuemin="0" aria-valuemax="100" style="width: {{ $level }}%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        </div>
    </section>
@endsection

@section('resume')
    @include('showPartials.resume')
@endsection

@section('portfolio')
    @include('showPartials.portfolio')
@endsection

@section('services')
    @include('showPartials.services')
@endsection

@section('testimonials')
    @include('showPartials.testimonials')
@endsection

@section('contact')
    @include('showPartials.contact')
@endsection

@section('footer')
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>iPortfolio</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
@endsection

