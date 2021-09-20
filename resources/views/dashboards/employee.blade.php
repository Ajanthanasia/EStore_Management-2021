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
                        <a class="btn btn-success" href="#">Employee name : {{Auth::user()->name}}</a> 
                        <a class="btn btn-success" href="{{url('resetpw')}}">Reset Password</a>
                        <a class="btn btn-success" href="{{url('emporders')}}">My Orders</a>
                        <a class="btn btn-success" href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('empdash')
        </div>

@endsection