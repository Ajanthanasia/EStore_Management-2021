@extends('dashboards.admin')
@section('admindash')



<div class="row">
        <div class="col-lg-12 margin-tb">
            <!--<div class="pull-left">
                <h2></h2>
            </div>-->
            </br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('employees.create')}}">Enroll new Employee</a>
            </div>
        </div>
    </div>
   
   <!-- success alert message -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach($employees as $person)
        <tr>
            <td>{{$person -> id}}</td>
            <td>{{$person -> name}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->mobile}}</td>
            <td>
                <form action="{{route('employees.destroy',$person->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                <a  class="btn btn-info" href="{{route('employees.show',$person->id) }}">Show</a>
                <a href="{{route('employees.edit',$person->id)}}" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
       @endforeach
      
    </table>
@endsection
