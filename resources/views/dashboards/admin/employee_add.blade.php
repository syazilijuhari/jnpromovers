@extends('layouts.master')

@section('title','Add Employee')

@section('content')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputID">ID</label>
                    <input type="text" id="inputID" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" id="inputName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputPhone">Phone No</label>
                    <input type="text" id="inputPhone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" id="inputEmail" class="form-control">
                </div>
                <input type="submit" value="Create Employee" class="btn btn-success float-right">
            </div>
        </div>
    </div>
@endsection
