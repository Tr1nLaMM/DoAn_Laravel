@extends('layouts.base')
@push('styles')
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/css/demo2.css')}}">
    <style>
        .color-image {
    margin: 20px;
}

.image-select {
    display: inline-block;
    border: 1px solid #ccc;
    padding: 10px;
}

h5 {
    margin: 0 0 5px 0;
}

.image-section {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.image-section li {
    display: inline-block;
    margin-right: 10px;
}

.color-swatch {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 2px solid #fff;
}
    </style>
@endpush
@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>{{$product->name}}</h3>
                        <nav>
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    Home
                                </a>
                            </li>
                                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="container">
            <div class="row gx-4 gy-5">
                <div class="col-lg-12 col-12">
                    <div class="details-items">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="details-image-1 ratio_asos">
                                            <div>
                                                <img src="{{asset("assets/images/fashion/product/front")}}/{{$product->image}}" 
                                                class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="{{$product->name}}">
                                            </div>                                      
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="cloth-details-size">
                                    <div class="details-image-concept">
                                        <h2>{{$product->name}}</h2>
                                    </div>

                                    <div class="label-section">
                                        <span class="badge badge-grey-color">#1 Best seller</span>
                                        <span class="label-text">Fashion</span>
                                    </div>

                                    <h3 class="price-detail">${{$product->price}}</h3>

                                    <div class="color-image">
                                        <div class="image-select">
                                            <h5>Color:</h5>
                                            <ul class="image-section">
                                                <li>
                                                    <a href="javascript:void(0)" data-color="#FF5733">
                                                        <div class="color-swatch" style="background-color: #FF5733;"></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" data-color="#33FF57">
                                                        <div class="color-swatch" style="background-color: #33FF57;"></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" data-color="#3357FF">
                                                        <div class="color-swatch" style="background-color: #3357FF;"></div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="selectSize" class="addeffect-section product-description border-product">
                                        <h6 class="product-title size-text">select size
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#sizemodal">size chart</a>
                                        </h6>

                                        <h6 class="error-message">please select size</h6>

                                        <div class="size-box">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)">s</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">m</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">l</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">xl</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <h6 class="product-title product-title-2 d-block">quantity</h6>

                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus"
                                                        onclick="updateQuantity()" data-type="minus" data-field="">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" id="quantity"
                                                    class="form-control input-number" value="1">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-right-plus"
                                                        onclick="updateQuantity()" data-type="plus" data-field="">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-buttons">
                                        <a href="javascript:void(0)" class="btn btn-solid">
                                            <i class="fa fa-bookmark fz-16 me-2"></i>
                                            <span>Wishlist</span>
                                        </a>
                                        <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('addtocart').submit();"                                            
                                            id="cartEffect" class="btn btn-solid hover-solid btn-animation">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add To Cart</span>
                                            <form id="addtocart" method="post" action="{{route('cart.store')}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                                <input type="hidden" name="quantity" id="qty" value="1">
                                            </form>
                                        </a>



                                    </div>

                                    <ul class="product-count shipping-order">
                                        <li>
                                            <img src="../assets/images/gif/truck.png" class="img-fluid blur-up lazyload"
                                                alt="image">
                                            <span class="lang">Free shipping for orders above $500 USD</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="cloth-review">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#desc" type="button">Description</button>

                                <button class="nav-link" id="nav-speci-tab" data-bs-toggle="tab" data-bs-target="#speci"
                                    type="button">Specifications</button>

                                <button class="nav-link" id="nav-size-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-guide" type="button">Sizing Guide</button>

                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#review" type="button">Review</button>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="desc">
                                <div class="shipping-chart">
                                    {{$product->description}}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="speci">
                                <div class="pro mb-4">
                                    <p class="font-light">The Model is wearing a white blouse from our stylist's
                                        collection, see the image for a mock-up of what the actual blouse would look
                                        like.it has text written on it in a black cursive language which looks great
                                        on a white color.</p>
                                    <div class="table-responsive">
                                        <table class="table table-part">
                                            <tr>
                                                <th>Product Dimensions</th>
                                                <td>15 x 15 x 3 cm; 250 Grams</td>
                                            </tr>
                                            <tr>
                                                <th>Date First Available</th>
                                                <td>5 April 2021</td>
                                            </tr>
                                            <tr>
                                                <th>Manufacturer‏</th>
                                                <td>Aditya Birla Fashion and Retail Limited</td>
                                            </tr>
                                            <tr>
                                                <th>ASIN</th>
                                                <td>B06Y28LCDN</td>
                                            </tr>
                                            <tr>
                                                <th>Item model number</th>
                                                <td>AMKP317G04244</td>
                                            </tr>
                                            <tr>
                                                <th>Department</th>
                                                <td>Men</td>
                                            </tr>
                                            <tr>
                                                <th>Item Weight</th>
                                                <td>250 G</td>
                                            </tr>
                                            <tr>
                                                <th>Item Dimensions LxWxH</th>
                                                <td>15 x 15 x 3 Centimeters</td>
                                            </tr>
                                            <tr>
                                                <th>Net Quantity</th>
                                                <td>1 U</td>
                                            </tr>
                                            <tr>
                                                <th>Included Components‏</th>
                                                <td>1-T-shirt</td>
                                            </tr>
                                            <tr>
                                                <th>Generic Name</th>
                                                <td>T-shirt</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade overflow-auto" id="nav-guide">
                                <div class="table-responsive">
                                    <table class="table table-pane mb-0">
                                        <tbody>
                                            <tr class="bg-color">
                                                <th class="my-2">US Sizes</th>
                                                <td>6</td>
                                                <td>6.5</td>
                                                <td>7</td>
                                                <td>8</td>
                                                <td>8.5</td>
                                                <td>9</td>
                                                <td>9.5</td>
                                                <td>10</td>
                                                <td>10.5</td>
                                                <td>11</td>
                                            </tr>

                                            <tr>
                                                <th>Euro Sizes</th>
                                                <td>39</td>
                                                <td>39</td>
                                                <td>40</td>
                                                <td>40-41</td>
                                                <td>41</td>
                                                <td>41-42</td>
                                                <td>42</td>
                                                <td>42-43</td>
                                                <td>43</td>
                                                <td>43-44</td>
                                            </tr>

                                            <tr class="bg-color">
                                                <th>UK Sizes</th>
                                                <td>5.5</td>
                                                <td>6</td>
                                                <td>6.5</td>
                                                <td>7</td>
                                                <td>7.5</td>
                                                <td>8</td>
                                                <td>8.5</td>
                                                <td>9</td>
                                                <td>10.5</td>
                                                <td>11</td>
                                            </tr>

                                            <tr>
                                                <th>Inches</th>
                                                <td>9.25"</td>
                                                <td>9.5"</td>
                                                <td>9.625"</td>
                                                <td>9.75"</td>
                                                <td>9.9735"</td>
                                                <td>10.125"</td>
                                                <td>10.25"</td>
                                                <td>10.5"</td>
                                                <td>10.765"</td>
                                                <td>10.85</td>
                                            </tr>

                                            <tr class="bg-color">
                                                <th>CM</th>
                                                <td>23.5</td>
                                                <td>24.1</td>
                                                <td>24.4</td>
                                                <td>25.4</td>
                                                <td>25.7</td>
                                                <td>26</td>
                                                <td>26.7</td>
                                                <td>27</td>
                                                <td>27.3</td>
                                                <td>27.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="review">
                                <div class="row g-4">
                                    <div class="col-lg-4">
                                        <div class="customer-rating">
                                            <h2>Customer reviews</h2>
                                            <ul class="rating my-2 d-inline-block">
                                                <li>
                                                    <i class="fas fa-star theme-color"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star theme-color"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star theme-color"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fas fa-star"></i>
                                                </li>
                                            </ul>

                                            <div class="global-rating">
                                                <h5 class="font-light">82 Ratings</h5>
                                            </div>

                                            <ul class="rating-progess">
                                                <li>
                                                    <h5 class="me-3">5 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 78%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">78%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">4 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 62%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">62%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">3 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 44%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">44%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">2 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 30%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">30%</h5>
                                                </li>
                                                <li>
                                                    <h5 class="me-3">1 Star</h5>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 18%"
                                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <h5 class="ms-3">18%</h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <p class="d-inline-block me-2">Rating</p>
                                        <ul class="rating mb-3 d-inline-block">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                        <div class="review-box">
                                            <form class="row g-4">
                                                <div class="col-12 col-md-6">
                                                    <label class="mb-1" for="name">Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Enter your name" required="">
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <label class="mb-1" for="id">Email Address</label>
                                                    <input type="email" class="form-control" id="id"
                                                        placeholder="Email Address" required="">
                                                </div>

                                                <div class="col-12">
                                                    <label class="mb-1" for="comments">Comments</label>
                                                    <textarea class="form-control" placeholder="Leave a comment here"
                                                        id="comments" style="height: 100px" required=""></textarea>
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit"
                                                        class="btn default-light-theme default-theme default-theme-2">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="customer-review-box">
                                            <h4>Customer Reviews</h4>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="../assets/images/inner-page/review-image/1.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>Mike K</h5>
                                                    <ul class="rating my-2 d-inline-block">
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                    </ul>
                                                    <p class="font-light">I purchased my Tab S2 at Best Buy but I wanted
                                                        to
                                                        share my thoughts on Amazon. I'm not going to go over specs and
                                                        such
                                                        since you can read those in a hundred other places. Though I
                                                        will
                                                        say that the "new" version is preloaded with Marshmallow and now
                                                        uses a Qualcomm octacore processor in place of the Exynos that
                                                        shipped with the first gen.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
                                                </div>
                                            </div>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="../assets/images/inner-page/review-image/2.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>Norwalker</h5>
                                                    <ul class="rating my-2 d-inline-block">
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                    </ul>
                                                    <p class="font-light">Pros: Nice large(9.7") screen. Bright colors.
                                                        Easy
                                                        to setup and get started. Arrived on time. Cons: a bit slow on
                                                        response, but expected as tablet is 2 generations old. But works
                                                        fine and good value for the money.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
                                                </div>
                                            </div>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="../assets/images/inner-page/review-image/3.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>B. Perdue</h5>
                                                    <ul class="rating my-2 d-inline-block">
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                    </ul>
                                                    <p class="font-light">Love the processor speed and the sensitivity
                                                        of
                                                        the touch screen.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
                                                </div>
                                            </div>

                                            <div class="customer-section">
                                                <div class="customer-profile">
                                                    <img src="../assets/images/inner-page/review-image/4.jpg"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>

                                                <div class="customer-details">
                                                    <h5>MSL</h5>
                                                    <ul class="rating my-2 d-inline-block">
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star theme-color"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-star"></i>
                                                        </li>
                                                    </ul>
                                                    <p class="font-light">I purchased the Tablet May 2017 and now April
                                                        2019
                                                        I have to charge it everyday. I don't watch movies on it..just
                                                        play
                                                        a game or two while on lunch. I guess now I need to power it
                                                        down
                                                        for future use.</p>

                                                    <p class="date-custo font-light">- Sep 08, 2021</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ratio_asos section-b-space overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-lg-4 mb-3">Customers Also Bought These</h2>
                    <div class="product-wrapper product-style-2 slide-4 p-0 light-arrow bottom-space">
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/23.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="http://localhost:8000/assets/images/fashion/product/back/23.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Cupiditate Minus</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Qui Laboriosam Quas Beatae</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Dolorem nihil quia qui laudantium expedita aut dolor.
                                                Qui eligendi voluptatem autem ullam et. Voluptas nemo eum nihil aliquam
                                                eos aperiam. Numquam dolorum veniam non magnam illum odit deleniti.</p>
                                        </div>
                                        <h3 class="theme-color">$1</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/6.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/back/6.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Qui Ut</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Id Expedita Dolorem Sit</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Rerum consequatur sunt placeat qui vero quod.
                                                Voluptatem doloremque commodi quaerat autem fugiat iste. Voluptatem
                                                repudiandae suscipit aut aspernatur maiores repellat corrupti.</p>
                                        </div>
                                        <h3 class="theme-color">$19</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/12.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="http://localhost:8000/assets/images/fashion/product/back/12.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Blanditiis Error</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Laborum Debitis Necessitatibus Architecto</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Ullam iure distinctio quaerat nam quasi rerum
                                                nesciunt. Eius ut porro tempore error. Quo quibusdam est praesentium
                                                quam reprehenderit officia vero. Commodi perspiciatis totam rerum
                                                voluptatem.</p>
                                        </div>
                                        <h3 class="theme-color">$4</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/11.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="http://localhost:8000/assets/images/fashion/product/back/11.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Cupiditate Minus</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Quidem Architecto Deleniti Hic</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Sit repellat fugit recusandae voluptates et est.
                                                Similique et consequuntur alias officia eos. Quos sed temporibus magnam
                                                est quo aut. Totam at ducimus occaecati sequi sint sed enim.</p>
                                        </div>
                                        <h3 class="theme-color">$7</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/20.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="http://localhost:8000/assets/images/fashion/product/back/20.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Qui Ut</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Error Itaque Debitis Commodi</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Quos voluptates aut dolorum. Velit delectus eligendi
                                                quia est. Explicabo sit dolores laboriosam ullam voluptas.</p>
                                        </div>
                                        <h3 class="theme-color">$5</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/8.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/back/8.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Blanditiis Error</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Odit Corporis Ut Pariatur</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Corrupti et assumenda saepe natus voluptatem deserunt
                                                aliquam. Non esse nemo exercitationem. Expedita libero quos quibusdam.
                                            </p>
                                        </div>
                                        <h3 class="theme-color">$18</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/2.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/back/2.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Dolores Et</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Doloremque Quibusdam Maxime Natus</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Hic fugiat molestiae sed. Impedit iusto nihil odio
                                                eos. Nisi et est aperiam ut non culpa amet. Nemo aut et ipsa pariatur
                                                cumque. Totam eveniet voluptatibus nostrum.</p>
                                        </div>
                                        <h3 class="theme-color">$11</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="details.html">
                                            <img src="../assets/images/fashion/product/front/14.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="back">
                                        <a href="details.html">
                                            <img src="http://localhost:8000/assets/images/fashion/product/back/14.jpg"
                                                class="bg-img blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="cart-wrap">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="addtocart-btn"
                                                    data-bs-toggle="modal" data-bs-target="#addtocart">
                                                    <i data-feather="shopping-bag"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <div class="rating-details">
                                        <span class="font-light grid-content">Qui Ut</span>
                                        <ul class="rating mt-0">
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star theme-color"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fas fa-star"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-price">
                                        <a href="details.php" class="font-default">
                                            <h5>Pariatur Qui Mollitia Et</h5>
                                        </a>
                                        <div class="listing-content">
                                            <span class="font-light">Regular Fit</span>
                                            <p class="font-light">Vero asperiores error sint soluta. Quia ut corrupti
                                                perferendis quo vero. Recusandae quae et possimus. Aut voluptatem sunt
                                                sit aliquid corporis aliquam.</p>
                                        </div>
                                        <h3 class="theme-color">$8</h3>
                                        <button onclick="location.href = 'cart.html';" class="btn listing-content">Add
                                            To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection