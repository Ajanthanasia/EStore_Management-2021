@extends('dashboards.customer')
@section('cusdash')
</br>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="detailsofuser">
                <h2>Confirm of the Cancellation</h2>
            </div>
                </br>
            <div class="detailsshow">
                <a class="btn btn-primary" href="#"> Back</a>
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
<div class="cancel">
    <form action="{{url('cancelcon',$order->id)}}" method="post">
        @csrf
            <input type="hidden" name="status" value="Cancelled">
            </br>      
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-danger">Confirm to Cancel</button>
            </div>
    </form>
</div>
@endsection