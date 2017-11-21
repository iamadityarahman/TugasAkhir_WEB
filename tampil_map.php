<script>
    function initMap() {
        var input = document.getElementById('latlng').value;
        var latlngStr = input.split(',', 2);
        var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 18,
            center: latlng
        });

        var tanda = new google.maps.Marker({
            position: latlng,
            map: map
        }); 
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPXMBmMqLeLI4U1jgF2V9T7bz3duMSx9M&callback=initMap"></script>