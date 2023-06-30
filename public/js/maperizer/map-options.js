(function(window, google, maperizer) {

    maperizer.MAP_OPTIONS = {
        geolocation: true,
        center: {
            lat: 14.628434,
            lng: -90.522713
        },
        zoom: 7,
        searchbox: true,
        cluster: false,
        geocoder: true
    }

}(window, google, window.Maperizer || (window.Maperizer = {})));
