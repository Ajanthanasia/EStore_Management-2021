@extends('dashboards.admin')
@section('admindash')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit an Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('employees.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
   <!-- error messages --> 

   @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
    <form action="{{route('employees.update',$employee->id)}}" method="post">
        @method('PUT')
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name :</strong>
                    <input type="text" name="name" value="{{$employee->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email :</strong>
                    <input type="text" name="email" value="{{$employee->email}}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender :</strong>
                    <select name="gender" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option class="from-control" value="{{$employee->gender}}">{{$employee->gender}}</option>
                        <option class="from-control" value="M">M</option>
                        <option class="from-control" value="F">F</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address :</strong>
                    <input type="text" name="address" value="{{$employee->address}}" class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number :</strong>
                    <input type="number" name="mobile" value="{{$employee->mobile}}" class="form-control" placeholder="Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password :</strong>
                    <input type="text" name="password" value="{{$employee->password}}" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>


@endsection