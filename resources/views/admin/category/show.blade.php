@extends('admin.dashboard_layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Category Details</h2>

                <div class="card">
                    <div class="card-header">
                        {{ $category->title }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Title: {{ $category->title }}</h5>
                        <p class="card-text">Slug: {{ $category->slug }}</p>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back to Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
