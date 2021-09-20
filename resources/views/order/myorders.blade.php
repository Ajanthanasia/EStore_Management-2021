@extends('dashboards.employee')
@section('empdash')


   
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
            <th>Product Name</th>
            <th>Detail</th>
            <th>Price</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer mobile no</th>
            <th>Date</th>
            <th>Delivered</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>w</td>
            <td>{{$order->proname}}</td>
            <td>{{$order->detail}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->mobile}}</td>
            <td>{{$order->created_at}}</td>
            <td><a href="{{url('delivery',$order->id)}}" class="btn btn-success"> Yes </a></td>
        </tr>
       @endforeach
       @foreach($deliveryorders as $order)
        <tr>
            <td>w</td>
            <td>{{$order->proname}}</td>
            <td>{{$order->detail}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->mobile}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->status}}</td>
        </tr>
       @endforeach
    </table>

@endsection