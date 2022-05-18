@extends('layouts.viewer')

@section('title','Service')

@section('content')
    <div class="content text-center advertiser-content" data-aos="fade-right">
        <div class="container mt-5 mb-3">
            <div class="row">
                @if(count($services) < 1)
                    <h5>No data to be displayed.</h5>
                @else
                    @foreach($services as $service)
                        <div class="col-md-4">
                            <div class="card p-3 mb-4">
                                <div class="mt-5">
                                    <h3 class="heading">{{$service->title}}</h3>
                                    <br>
                                    <h5 style="padding: 24px">{{$service->description}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
