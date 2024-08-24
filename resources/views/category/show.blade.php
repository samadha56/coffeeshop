@extends('layouts.app')

@section('page-title', '01 Brew Bar | Items of Category')

@section('content')
    <div
        class="header bg-white text-center p-3 border-bottom d-flex flex-column justify-content-center align-items-center sticky-top">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
            </a>
        </div>
        <h1 class="category-title">{{ $category->title }}</h1>
        <a href="{{ url('/') }}" class="back-button">Back</a>
    </div>
    <div class="content-container d-flex flex-column justify-content-center align-items-center flex-grow-1 p-3">
        @if ($items->isEmpty())
            <p class="no-items">Coming soon ... ;)</p>
        @else
            @foreach ($items as $item)
                <div class="item border-bottom border-dark p-2 mb-3 w-100">
                    <div class="card-body ps-2">
                        <div class="item-header">
                            <h5 class="item-title-en text-uppercase">{{ $item->english_name }}</h5>
                            <p class="item-price">{{ $item->price }}</p>
                        </div>
                        <h6 class="item-title-fa" dir="rtl">{{ $item->persian_name }}</h6>
                        <p class="item-description" dir="rtl">{{ $item->description }}</p>
                    </div>
                </div>
                <div class="separator"></div>
            @endforeach
        @endif
    </div>
@endsection
