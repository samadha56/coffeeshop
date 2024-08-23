@extends('admin.dashboard_layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Item Details</h2>

                <div class="card">
                    <div class="card-header">
                        {{ $item->english_name }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Category: {{ $item->category->title }}</h5>
                        <p class="card-text">English name: {{ $item->english_name }}</p>
                        <p class="card-text">Persian name: {{ $item->persian_name }}</p>
                        <p class="card-text">Description: {{ $item->description }}</p>
                        <p class="card-text">Price: {{ $item->price }}</p>
                        <a href="{{ route('admin.item.index') }}" class="btn btn-primary">Back to Items</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
