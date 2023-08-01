@extends('layouts.app')

@section('content')
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
