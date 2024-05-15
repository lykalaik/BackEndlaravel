<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrdersRequest;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function createorder(OrdersRequest $request)
    {
        $validated = $request->validated();
        $order = Orders::create($validated);
        return $order;
    }

    public function viewcart($customername)
    {
        $order = Orders::where('customername', $customername)
                        ->where('status', 'added to cart')
                        ->get();
        return $order;
    }
    public function vieworder($customername)
    {
        $order = Orders::where('customername', $customername)
                        ->where('status', 'completed')
                        ->get();
        return $order;
    }

    public function updateorder(OrdersRequest $request)
    
    {
        $orderIds = explode(',', $request->input('order_id'));
        $status = $request->input('status');
    
        Orders::whereIn('order_id', $orderIds)
            ->update(['status' => $status]);
    
        return response()->json(['message' => 'Status updated successfully']);
    }
    
    public function updatespecificorder(OrdersRequest $request, string $order_id)
    {
        $validated = $request->validated();

        $order = Orders::findOrFail($order_id);

        $order-> update($validated);
                    

        return $order;
    }

    public function deleteorder(string $id)
    {
        $order = Orders::findOrFail($id);

        $order->delete();

        return $order;
    }
    
}
