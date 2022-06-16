@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')
    <form action="{{route('customer.booking-two.post')}}" method="post">
        @csrf

        <input type="hidden" name="fromLat" value="{{ $order && $order->fromLat }}" />
        <input type="hidden" name="fromLong" value="{{ $order && $order->fromLong }}" />
        <input type="hidden" name="toLat" value="{{ $order && $order->toLat }}" />
        <input type="hidden" name="toLong" value="{{ $order && $order->toLong }}" />

        <div class="container-fluid p-md-0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <section id="datetime">
                <h3 style="font-weight: 700">Select Date & Time</h3>
                <div class="col-md-6">
                    <div class="form-group mt-4">
                        <div class="input-group" id="datetimepicker">
                            <input type="datetime-local" class="form-control" name="booking_datetime"
                                   value="{{ \Carbon\Carbon::parse($order->booking_datetime)->format('Y-m-d\TH:i') }}">
                        </div>
                    </div>
                </div>
            </section>

            <section id="location">
                <h3 style="font-weight: 700">Map</h3>

                <div class="container">
                    <div class="mb-3">
                        <label for="mapFrom" class="form-label">From</label>
                        <input type="text" class="form-control" id="mapFrom" name="address_from"
                               placeholder="Enter pickup address" value="{{$order->address_from}}">
                    </div>

                    <div class="mb-3">
                        <label for="mapTo" class="form-label">To</label>
                        <input type="text" class="form-control" id="mapTo" name="address_to"
                               placeholder="Enter dropoff address" value="{{$order->address_to}}">
                    </div>

                    <div class="card mb-3">
                        <div class="card-body response-body">
                        </div>
                        <div class="card-footer">
                            <p>Total Distance: <span id="distance"></span></p>
                            <p>Duration: <span id="duration"></span></p>
                        </div>
                    </div>

                    <div id="map-booking" style="height: 600px"></div>
                </div>

            </section>
        </div>

        <section id="actions" class="m-3">
            <div class="d-flex align-content-end justify-content-between">
                <div>
                    <a href="{{route('customer.booking-one')}}" type="submit" class="btn btn-danger"
                       style="color: white"><span><i class="fas fa-arrow-left"></i> Back</span></a>
                </div>
                <div class="d-flex">
                    <div class="mr-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">RM</span>
                            <input type="text" class="form-control" id="price" name="price" value="{{$price}}" readonly style="background-color: white">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger"
                                style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></button>
                    </div>
                </div>
            </div>
        </section>
    </form>

@endsection

@push('scripts')

    <script type="text/javascript">
        const sw = {lat: 0.8538205, lng: 98.7375747};
        const ne = {lat: 7.6667327, lng: 119.5833462};

        let geocoder, service;


        function calculateDistance(from, to) {
            const request = {
                origins: [from.position],
                destinations: [to.position],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false,
            };

            // UBAH DEKAT SINI HANAT
            service.getDistanceMatrix(request).then((response) => {
                $(".response-body").html(JSON.stringify(response, null, 2));

                const rows = response.rows[0].elements[0];
                // dapatkan value distance in METERS = rows.distance.value
                // dapatkan value duration in minutes (?) = rows.duration.value

                //console.log(rows);
                let price = {{$price}} + (3*(rows.distance.value/1000));
                price = price.toFixed(2)

                // TODO
                // Ubah masukkan ke dalam input.
                // pikir sendiri nak masuk dalam input hidden ke or disabled....
                $("#price").val(price)
                $("#distance").text(rows.distance.text);
                $("#duration").text(rows.duration.text);
            });
            // SAMPAI SINI JE
        }

        function initMap() {
            geocoder = new google.maps.Geocoder();
            service = new google.maps.DistanceMatrixService();

            const MY_BOUNDS = new google.maps.LatLngBounds(sw, ne);
            const klCenterPoint = {lat: 3.140853, lng: 101.693207};
            let destFrom, destTo;

            const map = new google.maps.Map(document.getElementById("map-booking"), {
                zoom: 8,
                center: klCenterPoint,
                disableDefaultUI: true,
                restriction: {
                    latLngBounds: MY_BOUNDS,
                    strictBounds: false
                }
            });

            const inputFrom = document.getElementById("mapFrom");
            const inputTo = document.getElementById("mapTo");

            const options = {
                componentRestrictions: {country: ["my", "sg"]},
                // fields: ["address_components", "geometry"],
                // types: ["address"],
            };
            const autocompleteFrom = new google.maps.places.Autocomplete(inputFrom, options);
            const autocompleteTo = new google.maps.places.Autocomplete(inputTo, options);
            autocompleteFrom.setBounds(MY_BOUNDS);
            autocompleteTo.setBounds(MY_BOUNDS);

            @if ($order->fromLat && $order->fromLong)
                destFrom = new google.maps.Marker({
                    map: map,
                    title: "{!! $order->address_from !!}",
                    label: "A",
                    position: new google.maps.LatLng(parseFloat({{$order->fromLat}}),parseFloat({{$order->fromLong}}))
                })
            @endif

            @if ($order->toLat && $order->toLong)
                destTo = new google.maps.Marker({
                    map: map,
                    title: "{!! $order->address_to !!}",
                    label: "B",
                    position: new google.maps.LatLng(parseFloat({{$order->toLat}}),parseFloat({{$order->toLong}}))
                })
            @endif

            @if ($order->fromLat && $order->fromLong && $order->toLat && $order->toLong)
                calculateDistance(destFrom, destTo);
            @endif

            // FROM
            autocompleteFrom.addListener("place_changed", () => {
                const place = autocompleteFrom.getPlace();

                if (destFrom)
                    destFrom.setMap(null);

                if (!place.geometry || !place.geometry.location) {
                    console.log("No details available for input: '" + place.name + "'");
                    return;
                }

                destFrom = new google.maps.Marker({
                    map,
                    title: place.name,
                    label: "A",
                    position: place.geometry.location,
                });

                $("input[name='fromLat']").val(place.geometry.location.lat());
                $("input[name='fromLong']").val(place.geometry.location.lng());

                if (destFrom && destTo)
                    calculateDistance(destFrom, destTo);
            })

            // TO
            autocompleteTo.addListener("place_changed", () => {
                const place = autocompleteTo.getPlace();

                if (destTo)
                    destTo.setMap(null);

                if (!place.geometry || !place.geometry.location) {
                    console.log("No details available for input: '" + place.name + "'");
                    return;
                }

                destTo = new google.maps.Marker({
                    map,
                    title: place.name,
                    label: "B",
                    position: place.geometry.location,
                });

                $("input[name='toLat']").val(place.geometry.location.lat());
                $("input[name='toLong']").val(place.geometry.location.lng());

                if (destFrom && destTo)
                    calculateDistance(destFrom, destTo);
            });
        }

        window.initMap = initMap;
    </script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_Yp6qQiS8G8dQoxeYGol5PB7RBaHeh9s&libraries=places&callback=initMap"></script>

@endpush
