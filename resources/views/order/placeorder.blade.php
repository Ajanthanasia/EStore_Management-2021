@extends('dashboards.customer')
@section('cusdash')
   
</br>
</br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Price</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->detail}}</td>
            <td>{{$product->price}}</td>
            <td>
                
                <a href="/order/{{Auth::user()->id}}/{{$product->id}}" class="btn btn-info">Order</a>
                
                
            </td>
        </tr>
       @endforeach
    </table>
@endsection