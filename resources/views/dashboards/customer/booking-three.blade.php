@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')

    <section id="services">
        <h3 style="font-weight: 700">Additional Services</h3>
        <div class="content booking-services">
            <div class="container text-center mt-4 mb-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <input type="checkbox" class="btn-check btn-services btn-lg" name="services" id="dismantle"
                               autocomplete="off">
                        <label class="btn btn-outline-danger btn-services btn-lg" for="dismantle">Dismantle</label>
                    </div>

                    <div class="col-auto">
                        <input type="checkbox" class="btn-check btn-services btn-lg" name="services" id="wrapping"
                               autocomplete="off">
                        <label class="btn btn-outline-danger btn-services btn-lg" for="wrapping">Wrapping</label>
                    </div>

                    <div class="col-auto">
                        <input type="checkbox" class="btn-check btn-services btn-lg" name="services" id="boxes"
                               autocomplete="off">
                        <label class="btn btn-outline-danger btn-services btn-lg" for="boxes">Boxes</label>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="actions" class="m-3">
        <div class="d-flex align-content-end justify-content-between">
            <div>
                <a href="{{route('customer.booking-two')}}" type="submit" class="btn btn-danger"
                   style="color: white"><span><i class="fas fa-arrow-left"></i> Back</span></a>
            </div>
            <div class="d-flex">
                <div class="mr-3">
                    <input type="text" class="form-control" disabled style="background-color: white; border: black;" />
                </div>
                <div>
                    <a href="{{route('customer.booking-three')}}" type="submit" class="btn btn-danger" style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </section>

@endsection
