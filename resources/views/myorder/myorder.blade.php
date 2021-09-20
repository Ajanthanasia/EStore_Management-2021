@extends('dashboards.customer')
@section('cusdash')
 
</br>
</br>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order Details</h2>
            </div>
            
        </div>
    </div>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Detail</th>
            <th>Price</th>
            <th>Delivery Person</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->proname}}</td>
            <td>{{$order->prodetail}}</td>
            <td>{{$order->proprice}}</td>
            <td>{{$order->empname}}</td>
            <td>

                    <a href="{{url('cancel',$order->id)}}" class="btn btn-danger">Cancel order</a>
                
            </td>
        </tr>
       @endforeach

       @foreach($cancelorders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->proname}}</td>
            <td>{{$order->prodetail}}</td>
            <td>{{$order->proprice}}</td>
            <td>{{$order->empname}}</td>
            <td>{{$order->status}}</td>
        </tr>
       @endforeach
      

       
      
    </table>

@endsection