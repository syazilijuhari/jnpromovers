@extends('layouts.master')

@section('title','Add Employee')

@section('content')
    {{--Message--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <form action="{{ route('admin.employee.store') }}" method="post">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Insert name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="text" name="phone" class="form-control" placeholder="Insert phone number (e.g. 60123456789)">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Insert email (e.g. yourname@gmail.com)">
                    </div>
                    <input type="submit" value="Create Employee" class="btn btn-success float-right">
                </div>
            </div>
        </div>
    </form>
@endsection
