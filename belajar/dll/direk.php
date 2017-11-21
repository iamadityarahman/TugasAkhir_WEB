<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
#map-canvas {
    height:400px;
}
</style>
</head>

<body>

<div id="map-canvas"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPXMBmMqLeLI4U1jgF2V9T7bz3duMSx9M&callback=initialize"
         async defer></script>
<script>

var directionDisplay;
var directionsService = new google.maps.DirectionsService();
var infowindow = new google.maps.InfoWindow();
var map;

function initialize() {

    directionsDisplay = new google.maps.DirectionsRenderer({
        suppressMarkers: true
    });

    var mapOptions = {
        zoom: 3,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }

    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    directionsDisplay.setMap(map);
    calcRoute();
}

function calcRoute() {
    var start = new google.maps.LatLng(43.786161, 11.250510);
    var end = new google.maps.LatLng(43.776030, 11.274929);

    createMarker(start, 'start');
    createMarker(end, 'end');

    var request = {
        origin: start,
        destination: end,
        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.WALKING
    };

    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
        }
    });
}

function createMarker(latlng, title) {
    var marker = new google.maps.Marker({
        position: latlng,
        title: title,
        map: map
    });

    google.maps.event.addListener(marker, 'click', function () {
        infowindow.setContent(title);
        infowindow.open(map, marker);
    });
}
</script>
</body>
</html>