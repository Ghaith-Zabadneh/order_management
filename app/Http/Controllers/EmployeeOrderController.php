<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class EmployeeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pass=0;
        $fail=0;
        $orders = Order::with('user')->latest()->get();
        foreach ($orders as $order){
            if($order->order_status == 'مقبول'){
                $pass++;
            }elseif($order->order_status == 'مرفوض'){
                $fail++;
            }
        }
        return view('Backend.employee.dashboard',compact('orders','pass','fail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_status' => 'required',
        ]);
        Order::findOrFail($request->id)->update([
            'order_status' => $request->order_status,
        ]);
        $notification = array(
            'message'=> "تم معالجة الطلب بنجاح",
            'alert-type' => 'success'
        );
        return redirect()->route('employee-order.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orders = Order::with('user')->latest()->get();
        return view('Backend.employee.order_table', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
