@extends('layouts.master')

@section('title','Edit Service')

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
    <form action="{{ route('admin.infodetails.update', $services->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$services->title}}">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category">
                            <option {{($services->category) == 'service' ? 'selected' : ''}} value="service">Service</option>
                            <option {{($services->category) == 'transport' ? 'selected' : ''}} value="transport">Transport</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text" name="desc" class="form-control" value="{{$services->description}}">
                    </div>
                    <input type="submit" value="Save" class="btn btn-success float-right">
                </div>
            </div>
        </div>
    </form>
@endsection
