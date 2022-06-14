@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')

    <h3 style="font-weight: 700">Additional Services</h3>
    <div class="content booking-services">
        <div class="container text-center mt-4 mb-3">
            <div class="row">
                <div class="col-md-auto">
                    <input type="checkbox" class="btn-check btn-services btn-lg" name="services" id="dismantle" autocomplete="off">
                    <label class="btn btn-outline-danger btn-services btn-lg" for="dismantle">Dismantle</label>
                </div>
                <div class="col-md-auto">
                    <input type="checkbox" class="btn-check btn-services btn-lg" name="services" id="wrapping" autocomplete="off">
                    <label class="btn btn-outline-danger btn-services btn-lg" for="wrapping">Wrapping</label>
                </div>
                <div class="col-md-auto">
                    <input type="checkbox" class="btn-check btn-services btn-lg" name="services" id="boxes" autocomplete="off">
                    <label class="btn btn-outline-danger btn-services btn-lg" for="boxes">Boxes</label>
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
                <a href="{{route('customer.booking-two')}}" type="submit" class="btn btn-danger" style="color: white"><span><i class="fas fa-arrow-left"></i> Back</span></a>
            </div>
            <div class="col-auto">
                <a href="{{route('customer.booking-two')}}" type="submit" class="btn btn-danger" style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </form>
    </div>

@endsection
