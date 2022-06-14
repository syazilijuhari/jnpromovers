@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')

    <div class="container-fluid p-md-0">
        <h3 style="font-weight: 700">Select Date & Time</h3>
        <div class="col-md-6">
            <div class="form-group mt-4">
                <div class="input-group" id="datetimepicker">
                    <input type="datetime-local" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form class="row g-3">
            <div class="col-md-2">
                <input type="text" class="form-control" disabled style="background-color: white; border: black;">
            </div>
            <div class="col-auto">
                <a href="{{route('customer.booking-one')}}" type="submit" class="btn btn-danger" style="color: white"><span><i class="fas fa-arrow-left"></i> Back</span></a>
            </div>
            <div class="col-auto">
                <a href="{{route('customer.booking-three')}}" type="submit" class="btn btn-danger" style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </form>
    </div>

@endsection
