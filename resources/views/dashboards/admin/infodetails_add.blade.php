@extends('layouts.master')

@section('title','Add Service')

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
    <form action="{{ route('admin.infodetails.store') }}" method="post">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        @csrf
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Insert service/transportation title">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category">
                            <option disabled selected value="">Select</option>
                            <option value="service">Service</option>
                            <option value="transport">Transport</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text" name="desc" class="form-control" placeholder="Insert description">
                    </div>
                    <input type="submit" value="Create Service" class="btn btn-success float-right">
                </div>
            </div>
        </div>
    </form>
@endsection
