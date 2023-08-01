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
    <section id="resume" class="resume">
        <div class="container">

            <div class="section-title">
                <h2>Resume</h2>


                <div class="row">
                    <div class="col-lg-6" data-aos="fade-up">
                        <h3 class="resume-title">Sumary</h3>
                        <div class="resume-item pb-0">
                            <h4>{{$about->name}}</h4>
                            <p><em>{{$resume->summary}}</em></p>
                            <ul>
                                <li>{{$resume->address}}</li>
                                <li>{{$about->phone}}</li>
                                <li>{{$about->email}}</li>
                            </ul>
                        </div>

                        <h3 class="resume-title">Education</h3>
                        @foreach($educations as $education)
                            <div class="resume-item">
                                <h4>{{ $education->title }}</h4>
                                <h5>{{ $education->year_of_graduate }}</h5>
                                <p><em>{{ $education->university }}</em></p>
                                <p>{{ $education->description }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">Professional Experience</h3>

                        @foreach($experiences as $experience)
                            <div class="resume-item">
                                <h4>{{$experience->job_title}}</h4>
                                <h5>{{$experience->start_year.' - '.$experience->end_year}}</h5>
                                <p><em>{{$experience->company}}</em></p>
                                <ul>
                                    {{$experience->description}}
                                </ul>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('portfolio')

    <section id="portfolio" class="portfolio section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Portfolio</h2>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($categories as $category)
                            <li data-filter=".filter-{{ strtolower($category->name) }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ strtolower($portfolio->category->name) }}">
                        <div class="portfolio-wrap">
                            <img src="{{ $portfolio->image }}" class="img-fluid" alt="{{ $portfolio->title }}">
                            <div class="portfolio-links">
                                <a href="{{ $portfolio->image }}" data-gallery="portfolioGallery"
                                   class="portfolio-lightbox" title="{{ $portfolio->title }}"><i class="bx bx-plus"></i></a>
                                <a href="{{ route('portfolio.show', $portfolio->id) }}" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('contact')
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row" data-aos="fade-in">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>{{$resume->address}}</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>{{$about->email}}</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>{{$about->phone}}</p>
                        </div>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section>
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

