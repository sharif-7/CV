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
            <h1>Portfolio</h1>
        </div><!-- End Page Title -->

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

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Portfolio</h5>
                            <!-- Create Portfolio Form -->
                            @if (count($categories) > 0)
                                <form action="{{ route('portfolio.store') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" rows="3"
                                                  required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category" class="form-control" required>
                                            <option value="" disabled selected>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Portfolio</button>
                                </form>
                            @else
                                <div class="alert alert-warning">
                                    No categories found. Please <a href="{{ route('category.create') }}">create a
                                        category</a> first.
                                </div>
                            @endif

                            <!-- Existing Portfolios -->
                            @if (count($portfolios) > 0)
                                <hr>
                                <h3>My Existing Portfolios</h3>
                                <div class="table-responsive mt-4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($portfolios as $index => $portfolio)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $portfolio->title }}</td>
                                                <td>{{ $portfolio->description }}</td>
                                                <td>
                                                    @if ($portfolio->category)
                                                        {{ $portfolio->category->name }}
                                                    @else
                                                        <em>No category</em>
                                                    @endif
                                                </td>
                                                <td>
                                                    <img src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}"
                                                         class="img-fluid img-thumbnail" style="max-height: 50px;">
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('portfolio.show', $portfolio->id) }}"
                                                           class="btn btn-info mr-2">
                                                            Show
                                                        </a>
                                                        <a href="{{ route('portfolio.edit', $portfolio->id) }}"
                                                           class="btn btn-primary mr-2">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('portfolio.destroy', $portfolio->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>No portfolios found.</p>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
