@extends('layouts.app')

@section('page-title', '01 Brew Bar | Online Menu and Submit Order')

@section('content')
    <div class="header bg-white text-center p-3 border-bottom d-flex justify-content-center align-items-center sticky-top">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
            </a>
        </div>
    </div>
    <div class="content-container d-flex flex-column justify-content-center align-items-center flex-grow-1 p-3">
        @foreach ($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}"
                class="category-card border-bottom border-dark p-2 mb-3 w-100">
                <div class="card-body ps-2">
                    <h5 class="card-title text-uppercase m-0">{{ $category->title }}</h5>
                </div>
            </a>
        @endforeach
    </div>
    </div>
@endsection
