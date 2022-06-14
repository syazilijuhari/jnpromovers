@extends('layouts.viewer')

@section('title', 'Booking')

@section('content')
    <div class="container-fluid p-md-0">
        <section id="datetime">
            <h3 style="font-weight: 700">Select Date & Time</h3>
            <div class="col-md-6">
                <div class="form-group mt-4">
                    <div class="input-group" id="datetimepicker">
                        <input type="datetime-local" class="form-control">
                    </div>
                </div>
            </div>
        </section>

        <section id="location">
            <h3 style="font-weight: 700">Map</h3>

            <div class="container">
                <div class="mb-3">
                    <label for="mapFrom" class="form-label">From</label>
                    <input type="text" class="form-control" id="mapFrom" placeholder="From">
                </div>

                <div class="mb-3">
                    <label for="mapTo" class="form-label">To</label>
                    <input type="text" class="form-control" id="mapTo">
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

    <section id="actions" class="mt-5">
        <div class="d-flex align-content-end justify-content-between">
            <div>
                <a href="{{route('customer.booking-one')}}" type="submit" class="btn btn-danger"
                   style="color: white"><span><i class="fas fa-arrow-left"></i> Back</span></a>
            </div>
            <div class="d-flex">
                <div class="mr-3">
                    <input type="text" class="form-control" disabled style="background-color: white; border: black;" />
                </div>
                <div>
                    <a href="{{route('customer.booking-two')}}" type="submit" class="btn btn-danger" style="color: white">Next <span><i class="fas fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
    </section>

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

                console.log(rows);

                // TODO
                // Ubah masukkan ke dalam input.
                // pikir sendiri nak masuk dalam input hidden ke or disabled....
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
                zoom: 7,
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
                fields: ["address_components", "geometry"],
                types: ["address"],
            };
            const autocompleteFrom = new google.maps.places.Autocomplete(inputFrom, options);
            const autocompleteTo = new google.maps.places.Autocomplete(inputTo, options);
            autocompleteFrom.setBounds(MY_BOUNDS);
            autocompleteTo.setBounds(MY_BOUNDS);

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

                if (destFrom && destTo)
                    calculateDistance(destFrom, destTo);
            });
        }

        window.initMap = initMap;
    </script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_Yp6qQiS8G8dQoxeYGol5PB7RBaHeh9s&libraries=places&callback=initMap"></script>

@endpush
