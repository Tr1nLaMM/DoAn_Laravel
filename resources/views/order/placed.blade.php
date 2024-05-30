@component('mail::message')
# Xác nhận Đơn Hàng

Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là thông tin đơn hàng của bạn:

**Tên:** {{ $order->name }}  
**Số điện thoại:** {{ $order->phone }}  
**Địa chỉ:** {{ $order->address }}, {{ $order->locality }}, {{ $order->city }}, {{ $order->state }}, {{ $order->country }}  
**Mã bưu điện:** {{ $order->zip }}  

@component('mail::button', ['url' => '#'])
Xem chi tiết đơn hàng
@endcomponent

Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!

Trân trọng,  
{{ config('app.name') }}
@endcomponent
