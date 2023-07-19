@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('hero')
    @include('partials.hero')
@endsection

@section('about')
    @include('partials.about')
@endsection

@section('skills')
    @include('partials.skills')
@endsection

@section('resume')
    @include('partials.resume')
@endsection

@section('portfolio')
    @include('partials.portfolio')
@endsection

@section('services')
    @include('partials.services')
@endsection

@section('testimonials')
    @include('partials.testimonials')
@endsection

@section('contact')
    @include('partials.contact')
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

