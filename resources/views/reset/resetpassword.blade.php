@extends('dashboards.employee')
@section('empdash')
</br>
</br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Reset your Password</h2>
        </div>
        <div class="pull-right">
           
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
 


<form action="/changepw" method="post">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <table>
                    <tr>
                        <th><strong>Current Password :</strong></th>
                        <th><input type="text" name="currentpassword" value="" class="form-control" placeholder="Current Password"></th>
                    </tr>
                    <tr>
                        <th><strong>New Password:</strong></th>
                        <th><input type="text" name="password" value="" class="form-control" placeholder="New Password"></th>
                    </tr>
                    <tr>
                        <th><strong>Confirm new Password :</strong></th>
                        <th><input type="text" name="newpassword" value="" class="form-control" placeholder="Confirm New Password"></th>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Change</button>
        </div>
    </div>
   
</form>


@endsection