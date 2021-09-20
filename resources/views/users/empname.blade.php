@extends('dashboards.employee')
@section('empdash')
</br>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <div class="detailsofuser">
                    <h2>About the Employee</h2>
                </div>
            </div>
        </div>
    </div>
</br>
<div class="detailsbelow">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name :</strong>
                {{Auth::user()->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
               {{Auth::user()->email}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender :</strong>
               {{Auth::user()->gender}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address :</strong>
               {{Auth::user()->address}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile :</strong>
                {{Auth::user()->mobile}}
            </div>
        </div>
    </div>
@endsection