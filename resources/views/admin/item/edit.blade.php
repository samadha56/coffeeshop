@extends('admin.dashboard_layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Item</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.item.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" class="form-control" id="category_id" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="english_name" class="form-label">English Name</label>
                        <input type="text" name="english_name" class="form-control" id="english_name"
                            value="{{ old('english_name', $item->english_name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="persian_name" class="form-label">Persian Name</label>
                        <input type="text" name="persian_name" class="form-control" id="persian_name"
                            value="{{ old('persian_name', $item->persian_name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description">{{ old('description', $item->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" id="price"
                            value="{{ old('price', $item->price) }}" required min="0">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Item</button>
                    <a href="{{ route('admin.item.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
