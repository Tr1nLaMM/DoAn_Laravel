<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Mail\OrderPlaced;
use App\Models\CartItem;
use App\Mail\OrderConfirmation;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
{
    // Xử lý đặt hàng ở đây và sau khi đặt hàng thành công:

    // Lấy thông tin về giỏ hàng từ session hoặc bất kỳ nguồn dữ liệu nào khác
    $cartItems = // Lấy thông tin về giỏ hàng

    // Tạo một đơn hàng mới và lưu vào cơ sở dữ liệu
    $order = new Order();
    $order->name = $request->input('name');
    $order->phone = $request->input('phone');
    $order->locality = $request->input('locality');
    $order->address = $request->input('address');
    $order->city = $request->input('city');
    $order->country = $request->input('country');
    $order->state = $request->input('state');
    $order->zip = $request->input('zip');
    $order->email = $request->input('email');
    // Thêm các thông tin khác của đơn hàng
    $order->save();
    
 
    

    // Truyền biến $order và $cartItems vào view
    return view('order.confirmation', ['order' => $order, 'cartItems' => $cartItems]);
}
}
