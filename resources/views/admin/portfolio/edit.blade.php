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
            <h1>Edit Portfolio</h1>
        </div><!-- End Page Title -->

        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $portfolio->title }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"
                                  required>{{ $portfolio->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="form-text text-muted">Upload a new image to replace the existing one
                            (Optional).</small>
                    </div>
                    <div class="mb-3">
                        <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}" class="img-fluid img-thumbnail"
                             style="max-height: 200px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Portfolio</button>
                    <a href="{{ route('portfolio.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
