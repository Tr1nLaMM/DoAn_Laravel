@extends('layouts.base')
@push('styles')
<style>
    /* styles.css */
.button-container {
    text-align: center;
    margin-top: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    margin-right: 10px;
}

.btn:hover {
    background-color: #0056b3;
}

</style>
@endpush
@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>Admin</h3>
                        <nav>
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    Home
                                </a>    
                            </li>
                                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
    </section>
    <div class="button-container">
        <a href="{{ url('admin/categories') }}" class="btn btn-primary">Category</a>
        <a href="{{ url('admin/products') }}" class="btn btn-primary">Product</a>
    </div>
@endsection
