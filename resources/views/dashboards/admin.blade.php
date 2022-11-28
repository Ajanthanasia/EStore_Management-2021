@extends('login.layout')
@section('login')

<div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="dash">
                    <h2>E-Store</h2>
                </div>
                <div class="options">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('admin.create')}}">Admin</a> 
                        <a class="btn btn-success" href="{{route('products.index')}}">Products</a>
                        <a class="btn btn-success" href="{{route('employees.index')}}">Employees</a>
                        <a class="btn btn-success" href="logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('admindash')
        </div>
@endsection