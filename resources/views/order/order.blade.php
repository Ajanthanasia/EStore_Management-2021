@extends('dashboards.customer')
@section('cusdash')
</br>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="detailsofuser">
                <h2>Show the Details</h2>
            </div>
            </br>
            <div class="detailsshow">
                <a class="btn btn-primary" href="{{url('placeorder')}}"> Back</a>
            </div>
        </div>
    </div>
</br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
			<strong>{{ $message }}</strong>
        </div>
        @endif
</br>
<div class="detailsform">
</br>
    <form action="{{url('storeorder')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{$product->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{$product->detail}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Employee :</strong>
                <select name="employee_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                @foreach($employees as $employee)                    
                    <option class="from-control" value="{{$employee->id}}">{{$employee->name}}</option>                                       
                @endforeach
                </select>
                
            </div>            
        </div>

        <input type="hidden" name="customer_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="status" value="null"> 
        
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{$product->price}}
            </div>
        
        </div>
        </br>
        </br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Order to Submit</button>
        </div>
    </div>
    </form>
</div>
@endsection