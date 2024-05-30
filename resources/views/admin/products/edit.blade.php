@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Product</h1>
                @if($product->image)
                    <div class="mb-3">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="150">
                    </div>
                @endif
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage(event)">
                        <img id="image-preview" src="" alt="Post Image"
                            class="mt-2 img-thumbnail" style="max-width: 200px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var dataURL = reader.result;
            var output = document.getElementById('image-preview');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection
