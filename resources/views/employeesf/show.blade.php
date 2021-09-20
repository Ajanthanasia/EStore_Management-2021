@extends('dashboards.admin')
@section('admindash')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show of Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('employees.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name :</strong>
                {{ $employee -> name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email :</strong>
                {{ $employee -> email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender :</strong>
                {{ $employee -> gender }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address :</strong>
                {{ $employee -> address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile :</strong>
                {{ $employee -> mobile }}
            </div>
        </div>
    </div>
@endsection