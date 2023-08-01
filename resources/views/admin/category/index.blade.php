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
            <h1>Categories</h1>
        </div><!-- End Page Title -->

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Create Category Form -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Create Category</h5>
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Category</button>
                            </form>
                        </div>
                    </div>

                    <!-- Existing Categories -->
                    @if (count($categories) > 0)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Existing Categories</h5>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                   class="btn btn-primary">Edit</a>
                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this category?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <p>No categories found.</p>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection
