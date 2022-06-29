@extends('layouts.viewer')

@section('title', 'Booking Details')

@section('content')

    <div class="container">
        <div class="card">
                <section id="details">
                    <div class="form-group row m-2">
                        <label for="datetime" class="col-sm-2 col-form-label" style="font-weight: bold">Date</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="datetime"
                                   value="{{ \Carbon\Carbon::parse($order_id->booking_datetime)->format('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="time" class="col-sm-2 col-form-label" style="font-weight: bold">Time</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="time"
                                   value="{{ \Carbon\Carbon::parse($order_id->booking_datetime)->format('h:i') }}">
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="address_from" class="col-sm-2 col-form-label"
                               style="font-weight: bold">Pickup</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="address_from"
                                   value="{{$order_id->address_from}}">
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="address_to" class="col-sm-2 col-form-label"
                               style="font-weight: bold">Dropoff</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="address_to"
                                   value="{{$order_id->address_to}}">
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="package" class="col-sm-2 col-form-label" style="font-weight: bold">Package</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="package"
                                   value="{{$order_id->package}}">
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="vehicle_type" class="col-sm-2 col-form-label"
                               style="font-weight: bold">Lorry</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="vehicle_type"
                                   value="{{$order_id->vehicle_type}}">
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="extra_service" class="col-sm-2 col-form-label"
                               style="font-weight: bold">Service(s)</label>
                        <div class="col-sm-10">
                            @foreach($order_id->extra_service as $item)
                                <input type="text" readonly class="form-control-plaintext" id="extra_service"
                                       value="{{$item}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="note" class="col-sm-2 col-form-label" style="font-weight: bold">Note</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="note"
                                   value="{{$order_id->note}}">
                        </div>
                    </div>
                    <div class="form-group row m-2">
                        <label for="note" class="col-sm-2 col-form-label" style="font-weight: bold">Price</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="price"
                                   value="RM {{$order_id->price}}">
                        </div>
                    </div>
                </section>
            <section id="actions" class="m-3">
                <div>
                    <a href="{{route('customer.booking-invoice', $order_id->order_id)}}" type="submit" class="btn btn-success float-right"
                       style="color: white">Generate Invoice
                    </a>
                </div>
            </section>
        </div>
    </div>

@endsection
