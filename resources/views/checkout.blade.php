@extends('layouts.base')

@section('content')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Checkout</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section Start -->
<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <form class="needs-validation" method="POST" action="place-order">
                    @csrf
                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">Địa chỉ thanh toán</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên đầy đủ">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="col-md-6">
                            <label for="locality" class="form-label">Địa phương</label>
                            <input type="text" class="form-control" id="locality" name="locality" placeholder="Nhập địa phương">
                        </div>
                        <div class="col-md-6">
                            <label for="landmark" class="form-label">Điểm chú ý</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Nhập điểm chú ý">
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Nhập địa chỉ"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="city" class="form-label">Thành phố</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Nhập thành phố">
                        </div>
                        <div class="col-md-3">
                            <label for="country" class="form-label">Quốc gia</label>
                            <select class="form-select custome-form-select" id="country" name="country">
                                <option>Việt Nam</option>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn quốc gia hợp lệ.</div>
                        </div>
                        <div class="col-md-3">
                            <label for="state" class="form-label">Tỉnh/Thành phố</label>
                            <select class="form-select custome-form-select" id="state" name="state">
                                <option selected="" disabled="" value="">Chọn...</option>
                                <option value="An Giang">An Giang</option>
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Đắk Nông">Đắk Nông</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="Hậu Giang">Hậu Giang</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Khánh Hòa">Khánh Hòa</option>
                                <option value="Kiên Giang">Kiên Giang</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Long An">Long An</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Ninh Bình">Ninh Bình</option>
                                <option value="Ninh Thuận">Ninh Thuận</option>
                                <option value="Phú Thọ">Phú Thọ</option>
                                <option value="Phú Yên">Phú Yên</option>
                                <option value="Quảng Bình">Quảng Bình</option>
                                <option value="Quảng Nam">Quảng Nam</option>
                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                <option value="Quảng Ninh">Quảng Ninh</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Sóc Trăng">Sóc Trăng</option>
                                <option value="Sơn La">Sơn La</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Thái Bình">Thái Bình</option>
                                <option value="Thái Nguyên">Thái Nguyên</option>
                                <option value="Thanh Hóa">Thanh Hóa</option>
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                <option value="Tiền Giang">Tiền Giang</option>
                                <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Yên Bái">Yên Bái</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="zip" class="form-label">Mã bưu điện</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="123456">
                        </div>
                        <div class="col-md-6">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="col-md-12 form-check ps-0 mt-3 custome-form-check" style="padding-left:15px !important;">
                            <input class="checkbox_animated check-it" type="checkbox" name="sameAsBilling" id="sameAsBilling">
                            <label class="form-check-label" for="sameAsBilling">Sử dụng địa chỉ này làm địa chỉ giao hàng</label>
                        </div>
                    </div>

                    <hr class="my-lg-5 my-4">

                    <h3 class="mb-3">Thanh toán</h3>

                    <div class="d-block my-3">
                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="paymentMethod" checked="" id="cod">
                            <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="debit">
                            <label class="form-check-label" for="debit">Thẻ ghi nợ</label>
                        </div>
                        <div class="form-check custome-radio-box">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row g-4" style="display: none;">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Tên trên thẻ</label>
                            <input type="text" class="form-control" id="cc-name">
                            <div id="emailHelp" class="form-text">Tên đầy đủ như hiển thị trên thẻ</div>
                        </div>
                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Số thẻ tín dụng</label>
                            <input type="text" class="form-control" id="cc-number">
                            <div class="invalid-feedback">Cần nhập số thẻ tín dụng</div>
                        </div>
                        <div class="col-md-3">
                            <label for="expiration" class="form-label">Ngày hết hạn</label>
                            <input type="text" class="form-control" id="expiration">
                        </div>
                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv">
                        </div>
                    </div>
                    <button class="btn btn-solid-default mt-4 border" type="submit">Order</button>
                </form>
            </div>

            <div class="col-lg-4">
                <h3>Giỏ hàng của bạn</h3>
                <ul class="list-group mb-3">
                @foreach(Cart::instance('cart')->content() as $item)
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">{{ $item->name }}</h6>
                                <small class="text-muted">Quantity: {{ $item->qty }}</small>
                            </div>
                            <span class="text-muted">${{ $item->subtotal() }}</span>
                        </li>
                        @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{ $item->price }}</strong>
                    </li>
                </ul>

                <form class="card border-0" action="{{ route('promo.apply') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="promo_code" placeholder="Mã khuyến mãi">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->
@endsection
