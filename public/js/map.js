$(document).ready(function () {

    var myLatLng = {lat: 3.0176167179248314, lng: 101.67313795093163};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        zoom: 18
    });

    //marker
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'JN Pro Movers'
    })

    var request = {
        location: myLatLng,
        radius: '1500',
        types: ['office']
    };

    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, callback);

    function callback(result, status) {

        console.log(result)

    }
});
