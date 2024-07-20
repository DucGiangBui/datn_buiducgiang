<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\TemplateCard;
use App\Models\OrderInfo;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderInfo')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::with('orderInfo', 'templateCard')->findOrFail($id);

        $templates = TemplateCard::all();

        return view('admin.orders.edit', compact('order', 'templates'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|integer|in:1,2,3,4',
            'template_id' => 'nullable|exists:template_cards,template_id',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->template_id = $request->input('template_id');
        $order->save();

        $orderInfo = OrderInfo::findOrFail($order->order_info_id);
        $orderInfo->name = $request->input('name');
        $orderInfo->phone = $request->input('phone');
        $orderInfo->address = $request->input('address');
        $orderInfo->save();

        return redirect()->route('ordersMaster.index')->with('message', 'Cập nhật đơn hàng thành công!');
    }

}
