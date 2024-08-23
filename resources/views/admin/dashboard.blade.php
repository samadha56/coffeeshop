@extends('admin.dashboard_layout')
@section('content')
<div class="cards">
    <div class="card">
        <h3>Total Categories</h3>
        <p>{{ $categoriesCount }}</p>
    </div>
    <div class="card">
        <h3>Total Items</h3>
        <p>{{ $itemsCount }}</p>
    </div>
</div>
@endsection