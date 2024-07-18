<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\PaymentHistory;
use App\Models\TemplateCard;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'template_ids' => 'required|string',
        ]);

        $orderInfo = OrderInfo::create([
            'name' => $request->name,
            'position' => $request->position,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        $order = Order::create([
            'status' => '1',
            'order_info_id' => $orderInfo->order_info_id,
            'template_id' => $request->template_ids,
        ]);

        $totalCost = 100000;

        PaymentHistory::create([
            'order_id' => $order->id,
            'cost' => $totalCost,
        ]);

        return to_route('orders')->with(['message' => 'Đặt hàng thành công!']);
    }
}
