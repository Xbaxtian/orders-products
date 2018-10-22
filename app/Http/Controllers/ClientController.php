<?php

namespace App\Http\Controllers;

use App\Role;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vendor_role = Role::where('name', 'vendor')->first();
        return view('client.home', [
            'vendors' => $vendor_role->users
        ]);
    }

    public function prepareOrder($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        return view('client.prepare_order', [
            'product' => $product
        ]);
    }

    public function submitOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->product_id = $request->productid;
        $order->status = 'sended';
        $order->response = 'waiting';
        $order->shipping = $request->shipping;
        $order->billing = $request->billing;
        $order->quantity = $request->quantity;
        $order->total = $request->total;
        $order->save();
        return view('client.sended_order', [
           'order' => $order
        ]);
    }

    public function clientOrders()
    {
        return view('client.orders');
    }
}
