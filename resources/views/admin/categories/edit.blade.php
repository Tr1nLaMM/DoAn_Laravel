@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Category</h1>
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        @if ($category->image)
                            <img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 100px;">
                        @else
                            No image
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

