@extends('layouts.viewer')

@section('title','Contact')

@section('content')

<div class="container contact">

    <div class="row">
        <div class="col-md-6">
            <iframe width="500"
                    height="530"
                    style="border:0"
                    loading="lazy"
                    allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=jn%20pro%20services&key=AIzaSyB3ZZcF07Fh1N00p_SHPQ8YNnC6iOngNnQ">
            </iframe>
        </div>
        <div class="col-md-6">
            <h3 style="font-weight: 700">Contact Info</h3>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <h6 style="font-weight: 600">Phone No:</h6>
                    <p>010-776 6745</p>
                </div>
                <div class="col-md-6">
                    <h6 style="font-weight: 600">Address:</h6>
                    <p>1, Jalan PUJ 5/10, Taman Puncak Jalil, 43300 Seri Kembangan, Selangor</p>
                </div>
            </div>
            <div class="row">
                <h6 style="font-weight: 600">Send us an email</h6>
                <div class="container-form" >
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form method="post" action="{{url('sendemail/send')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Enter Your Name</label>
                            <input type="text" name="name" class="form-control" value="" />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Email</label>
                            <input type="text" name="email" class="form-control" value="" />
                        </div>
                        <div class="form-group">
                            <label>Enter Your Message</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="send" class="btn btn-info form-control" value="Send" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
