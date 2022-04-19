@extends('layouts.viewer')

@section('title','About')

@section('content')
    <div class="container portfolio">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-about">
                    <img src="https://image.ibb.co/cbCMvA/logo.png">
                </div>
            </div>
        </div>
        <div class="bio-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bio-image">
                                <img src="{{asset('img/jnpro-logo.png')}}" alt="logo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bio-content">
                        <h1>JN Pro Movers</h1>
                        <br>
                        <p>We are dedicated team of professional moving company for homes and offices.  JNPro Movers is passionate to to work with you to keep the moving more easier and safely transport your items to your desire location. Whether your move is large or small, we would strive to complete the job with utmost dedication.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
