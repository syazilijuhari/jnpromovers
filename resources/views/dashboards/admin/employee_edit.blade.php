@extends('layouts.master')

@section('title','Edit Employee')

@section('content')
    {{--Message--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <form action="{{ route('admin.employee.update', $employee->user_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$employee->name}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$employee->email}}">
                    </div>
                    <input type="submit" value="Save" class="btn btn-success float-right">
                </div>
            </div>
        </div>
    </form>
@endsection
