@extends('login.layout')
@section('login')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <div class="login">
        <h1 class="display">E-Store</h1>
    </div>
        <br/>
    @if(isset(Auth::user()->email))
    <script>window.location="admin"</script>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
			<strong>{{ $message }}</strong>
        </div>
        @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif


	<div>
      <form method="post" action="{{url('check')}}"> 
          {{ csrf_field() }}
            <table>
                <div class="form-group">
                    <tr>    
                        <th><label for="email">Email :</label></th>
                        <th><input type="email" class="form-control" name="email"/></th>
                    </tr>
                </div>
                <div class="form-group">
                    <tr>
                        <th><label for="password">Password:</label></th>
                            <th><input type="password" class="form-control" name="password"/></th>
                    </tr>
                </div>
            </table>
                <div class="form-group">              
                    <button type="submit" class="btn btn-primary">Login</button>
                <div>
      </form>
        </br>
            <div class="form-group">              
                    <a class="btn btn-primary" href="{{route('customers.create')}}">Register</a>
            <div>
    </div>
@endsection