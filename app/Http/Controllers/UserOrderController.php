<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.user.add_order');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|min:5|max:60',
            'description' => 'required|min:30',
        ]);
        Order::create([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'description' => $request->description
        ]);
        $notification = array(
            'message'=> "تم اضافة الطلب بنجاح",
            'alert-type' => 'success'
        );
        return redirect()->route('user-dashboard')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order =  Order::findOrFail($id);
        return view('Backend.user.edit_order',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'subject' => 'required|min:5|max:60',
            'description' => 'required|min:30',
        ]);
        Order::findOrFail($id)->update([
            'subject' => $request->subject,
            'description' => $request->description
        ]);
        $notification = array(
            'message'=> "تم تعديل الطلب بنجاح",
            'alert-type' => 'info'
        );
        return redirect()->route('user-dashboard')->with($notification);
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
        return redirect()->route('user-dashboard')->with($notification);
    }
}
