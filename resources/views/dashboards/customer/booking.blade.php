@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')
    <div class="container-fluid p-md-0">
        <div class="col-md-6">
            <h3 style="font-weight: 700">Select Date & Time</h3>
            <div class="form-group">
                <div class="input-group" id="datetimepicker">
                    <input type="datetime-local" class="form-control">
                </div>
            </div>
        </div>
    </div>
@endsection
