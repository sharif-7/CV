@extends('admin.layouts.app')

@section('header')
    @include('admin.partials.header')
@endsection

@section('sidebar')
    @include('admin.partials.sidebar')
@endsection

@section('main')
    <div class="container">
        <div class="pagetitle">
            <h1>Portfolio Details</h1>
        </div><!-- End Page Title -->

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $portfolio->title }}</h5>
                <p class="card-text">{{ $portfolio->description }}</p>
                <p><strong>Category:</strong>
                    @if ($portfolio->category)
                        {{ $portfolio->category->name }}
                    @else
                        <em>No category</em>
                    @endif
                </p>
                <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="img-fluid mb-3">
                <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
