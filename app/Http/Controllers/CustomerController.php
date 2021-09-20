<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login.registerc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            
            'email' => 'required',
            'password' => 'required|alphaNum|min:5'
        ]);
        $user = new User([
            'name'=> $request->get('name'),
            'email'=> $request->get('email'),
            'gender'=> $request->get('gender'),
            'address'=> $request->get('address'),
            'mobile'=> $request->get('mobile'),
            'role'=> $request->get('role'),
            'password'=> Hash::make($request->get('password')),
            'remember_token' => Str::random(10),
        ]);
        $user ->save();

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );
        if($request->get('role') == 'customer') {
            if(Auth::attempt($user_data))
            {
                return view('dashboards.customer',compact('user_data'));
            }
        }
        else
        {
            return back()->with('error','Wrong Login Details');
        }



        //return redirect() ->route('customers.index')->with('success','Product created successfully!');
    }

    public function placeorder()
    {
        $products=Product::all();
        return view('order.placeorder',compact('products'));
    }
    public function order(User $user,Product $product)
    {
        $employees=User::all()->where('role','employee');
        return view('order.order',compact('user','product','employees'));
    }

    public function storeorder(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'employee_id' => 'required',
            'product_id' => 'required',
            'status' => 'required',
        ]);
        Order::create($request->all());

        return back()->with('success','Your order submited successfully!');

    }
    public function myorder()
    {
        $orders=DB::table('orders')
        ->join('users','orders.employee_id','=','users.id')
        ->join('products','products.id','=','orders.product_id')
        ->select('users.name as empname','products.name as proname','products.detail as prodetail','products.price as proprice','orders.id')
        ->where('orders.customer_id',Auth::user()->id)
        ->where('status','null')
        ->get();
        $cancelorders=DB::table('orders')
        ->join('users','orders.employee_id','=','users.id')
        ->join('products','products.id','=','orders.product_id')
        ->select('users.name as empname','products.name as proname','products.detail as prodetail','products.price as proprice','orders.id','orders.status')
        ->where('orders.customer_id',Auth::user()->id)
        ->whereIn('status',['Cancelled','Delivered'])
        ->get();
        return view('myorder.myorder',compact('orders','cancelorders'));
    }
    public function cancelorder(Order $order)
    {
        return view('myorder.cancel',compact('order'));
    }
    public function confirmcancel(Request $request,Order $order)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $order->update($request->only('status'));
        return back()->with('success','Your Order is cancelled successfully!');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('users.custname');
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
