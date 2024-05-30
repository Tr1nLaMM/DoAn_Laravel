@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>products</h1>
                <a href="{{route('products.create') }}" class="btn btn-primary mb-3">Create New Products</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Des</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description}}</td>
                                <td>{{ $product->category->name}}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if ($product->image)
                                    <img src="{{asset("assets/images/fashion/product/front")}}/{{$product->image}}" style="width:200px;"/>
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection