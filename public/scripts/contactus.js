function initMap() {
    var myLatLng = {lat: 18.507081, lng: 73.7912133};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
    });
}