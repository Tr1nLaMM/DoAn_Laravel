<!-- resources/views/order/confirmation.blade.php -->

@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order confirmation</div>
                    <div class="card-body">
                        @if ($order)
                            <p>Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đã được xác nhận.</p>
                            <p>Thông tin đơn hàng:</p>
                            <ul>
                                <li>Mã đơn hàng: {{ $order->id }}</li>
                                <li>Tên: {{ $order->name }}</li>
                                <li>Email: {{ $order->email }}</li>
                                <li>Địa chỉ: {{ $order->address }}</li>
                                <!-- Thêm các thông tin khác của đơn hàng -->
                            </ul>
                        @else
                            <p>Không tìm thấy thông tin đơn hàng.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
