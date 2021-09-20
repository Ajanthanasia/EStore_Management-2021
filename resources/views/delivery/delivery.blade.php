@extends('dashboards.employee')
@section('empdash')

</br>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="deliveryhead">
                <h2>Confirm the Delivery</h2>
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
    <form action="{{url('condelivery',$order->id)}}" method="post">
        @csrf        
            <input type="hidden" name="status" value="Delivered">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Confirm to Delivery</button>
            </div>
    </form>
@endsection