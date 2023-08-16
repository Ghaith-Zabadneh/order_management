<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users_count = count(User::where('role','User')->get());
        $employees_count = count(User::where('role','Employee')->get());
        $users = User::latest()->get();
        $orders = Order::latest()->get();
        return view('Backend.admin.dashboard',compact('users','orders','users_count','employees_count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.admin.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'code' => $request->password,
            'role' => $request->role,
        ]);
        $notification = array(
            'message'=> "تمت الاضافة بنجاح",
            'alert-type' => 'success'
        );
        return redirect()->route('admin.show','user')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::latest()->get();
        return view('Backend.admin.users_table',compact('users'));
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
        $validated = $request->validate([
            'status' => 'required',

        ]);
        User::findOrFail($id)->update([
            'status' => $request->status,
        ]);
        $notification = array(
            'message'=> "تم تعديل الحالة بنجاح",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();
        $notification = array(
            'message'=> "تم حذف الطلب بنجاح",
            'alert-type' => 'warning',
        );
        return back()->with($notification);
    }
     /**
     * Get all orders.
     */
    public function order (){
        $orders = Order::with('user')->latest()->get();
        return view('Backend.admin.order_table',compact('orders'));
    }
}
