@extends('layouts.viewer')

@section('content')
    {{-- @include('layouts.loading') --}}

    <div class="content-wrapper">
        <div class="landing-bg img-fluid">
            <div class="content">
                <div class="container">
                    <div class="landing-header d-flex flex-column justify-content-center">
                        <p class="mb-0" data-aos="fade-right">
                            JN Pro Movers
                        </p>
                        <small data-aos="fade-right">
                            We provide the best moving services for home and offices to keep the moving more easier and safely transport your items to your desire location.
                        </small>

                        <div class="row ml-1 mt-5">
                            <button class="landing-btn" data-aos="fade-right">
                                <i class="fas fa-angle-double-down"></i>
                                &nbsp;
                                <a href="#services">See our services</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-offer" id="services">
        <div class="container text-center">
            <h1 data-aos="fade-up">Our Services</h1>
            <br>
            <div class="row justify-content-center align-items-center" data-aos="fade-up">
                <div class="col-md-2">
                    <img src="{{ asset('img/service-icon.png') }}" alt="UKMads logo" class="img-fluid" style= "height: 160px" >
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <blockquote>
                            <h2 class="card-title text-md-left" style="font-size: 1.5rem">Service</h2>
                            <p class="card-text text-sm-left">
                                We provide moving house and office services professionally including packaging and unpacking service, dismantle and reassemble services, disposal services and valuable moving for fragile item that required additional wrapping and protection.
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center" data-aos="fade-up">
                <div class="col-md-2">
                    <img src="{{ asset('img/lorry-icon.png') }}" alt="UKMads logo" class="img-fluid" style= "height: 160px" >
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <blockquote>
                            <h2 class="card-title text-md-left" style="font-size: 1.5rem">Transport</h2>
                            <p class="card-text text-sm-left">
                                We supply 1 or 3 ton lorry with manpower to move the customer's furnitures and other stuff for local move within Peninsular Malaysia
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-advertiser" id="advertiser">
        <div class="content text-center advertiser-content" data-aos="fade-right">
            <h3>How it works?</h3>
            <div class="container mt-5 mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"><img src="{{ asset('img/number-1.png') }}" class="img-fluid"></div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h3 class="heading">Get a Quotation</h3>
                                <br>
                                <h5 style="padding: 24px">Quotation can be acquired by creating your account and fill the booking form.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"><img src="{{ asset('img/number-2.png') }}" class="img-fluid"></div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h3 class="heading">Plan Your Move</h3>
                                <br>
                                <h5 style="padding: 24px">Determine your move date and give us your item details.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 mb-2">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="icon"><img src="{{ asset('img/number-3.png') }}" class="img-fluid"></div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h3 class="heading">Schedule Your Move</h3>
                                <br>
                                <h5 style="padding: 24px">Our manpower will be at your destination on time with the necessary tools.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="landing-organizer" id="organizer">
        <div class="content text-center organizer-content" data-aos="fade-down">
            <h3>Why Us?</h3>
            <div class="container mt-5 mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-3 mb-2">
                            <div class="mt-5">
                                <h3 class="heading">Transparent Pricing</h3>
                                <br>
                                <h5 style="padding: 24px">We offer accurate price and no additional hidden cost for your move.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 mb-2">
                            <div class="mt-5">
                                <h3 class="heading">Preferred Schedule</h3>
                                <br>
                                <h5 style="padding: 24px">Choose the best time and day for your move even over the weekends.</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3 mb-2">
                            <div class="mt-5">
                                <h3 class="heading">Trained Manpower</h3>
                                <br>
                                <h5 style="padding: 24px">Our team of expert movers are well-trained to handle moving service.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
