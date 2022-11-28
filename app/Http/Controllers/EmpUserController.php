<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class EmpUserController extends Controller
{
    public function myorders()
    {
        $orders=DB::table('orders')
        ->join('users','orders.customer_id','=','users.id')
        ->join('products','products.id','=','orders.product_id')
        ->select('users.name','users.address','users.mobile','products.name as proname','products.detail','products.price','orders.created_at','orders.id')
        ->where('orders.employee_id',Auth::user()->id)
        ->where('status','null')
        ->get();
        $deliveryorders=DB::table('orders')
        ->join('users','orders.customer_id','=','users.id')
        ->join('products','products.id','=','orders.product_id')
        ->select('users.name','users.address','users.mobile','products.name as proname','products.detail','products.price','orders.created_at','orders.id','orders.status')
        ->where('orders.employee_id',Auth::user()->id)
        ->whereIn('status',['Cancelled','Delivered'])
        ->get();
        return view('order.myorders',compact('orders','deliveryorders'));
    }

    public function resetpassword()
    {
        return view('reset.resetpassword');
    }
    public function changepassword(Request $request)
    {
        $this->validate($request,[
            'currentpassword' => 'required',
            'password'=> 'required|alphaNum|min:5',
            'newpassword' => 'required|same:password'
        ]);
        $data = $request->all();

        $user = User::find(auth()->user()->id);

        if(Hash::check($data['currentpassword'],$user->password))
        {
            $user->password=Hash::make($data['password']);
            $user->update();
            return back()->with('success','Employee Password updated successfully!');
        }
        else
        {
            return back()->with('error','The specified password does not match the database password');
        }
    }

    public function delivery(Order $order)
    {
        return view('delivery.delivery',compact('order'));
    }
    public function confirmdelivery(Request $request,Order $order)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $order->update($request->only('status'));
        return back()->with('success','Your Order is Deliveried successfully!');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.empname');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
