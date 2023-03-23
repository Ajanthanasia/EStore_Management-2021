@extends('login.layout')
@section('login')

<div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <div class="dash">
                        <h2>E-Store</h2>
                    </div>
                </div>
                <div class="options">
                    <div class="pull-right">
                        <h6>Welcome {{Auth::user()->name}}</h6>
                        <a class="btn btn-success" href="{{url('cusname')}}">Customer</a> 
                        <a class="btn btn-success" href="{{url('placeorder')}}">Place Orders</a>
                        <a class="btn btn-success" href="{{url('myorder')}}">My Orders</a>
                        <a class="btn btn-success" href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('cusdash')
        </div>

@endsection