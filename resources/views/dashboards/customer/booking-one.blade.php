@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')

    <h3 style="font-weight: 700">Choose Package</h3>
    <div class="content booking-package">
        <div class="container text-center mt-4 mb-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 mb-4">
                        <div class="mt-5">
                            <h3 class="heading">Package A</h3>
                            <br>
                            <h5 style="padding: 24px">Without Manpower</h5>
                        </div>
                        <input type="radio" class="btn-check btn-package" name="package" id="package-a" autocomplete="off">
                        <label class="btn btn-outline-danger" for="package-a">Package A</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 mb-4">
                        <div class="mt-5">
                            <h3 class="heading">Package B</h3>
                            <br>
                            <h5 style="padding: 24px">1 Manpower</h5>
                        </div>
                        <input type="radio" class="btn-check btn-package" name="package" id="package-b" autocomplete="off">
                        <label class="btn btn-outline-danger" for="package-b">Package B</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 mb-4">
                        <div class="mt-5">
                            <h3 class="heading">Package C</h3>
                            <br>
                            <h5 style="padding: 24px">2 Manpower</h5>
                        </div>
                        <input type="radio" class="btn-check btn-package" name="package" id="package-c" autocomplete="off">
                        <label class="btn btn-outline-danger" for="package-c">Package C</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 style="font-weight: 700">Choose Transportation</h3>
    <div class="content booking-transportation">
        <div class="container text-center mt-4 mb-3">
            <div class="row">
                <div class="col-md-2">
                    <input type="radio" class="btn-check btn-transport btn-lg" name="transport" id="lorry-1tan" autocomplete="off">
                    <label class="btn btn-outline-danger btn-transport btn-lg" for="lorry-1tan">1 Ton Lorry</label>
                </div>
                <div class="col-md-2">
                    <input type="radio" class="btn-check btn-transport btn-lg" name="transport" id="lorry-3tan" autocomplete="off">
                    <label class="btn btn-outline-danger btn-transport btn-lg" for="lorry-3tan">3 Ton Lorry</label>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form class="row g-3">
            <div class="col-md-2">
                <input type="text" class="form-control" disabled style="background-color: white; border: black;">
            </div>
            <div class="col-md-2">
                <a href="{{route('customer.booking-two')}}" type="submit" class="btn btn-danger" style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </form>
    </div>
@endsection

