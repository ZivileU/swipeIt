<?php
require_once "templates/header.php";
?>

<div class="d-flex flex-column align-items-center mt-5">

    <p id="userMessage" class='text-center'>Click the button to get your position.</p>
    <button id="btnLocate" type="button" class="btn btn-dark" onclick="getLocation()">Get location</button>
    <div class="mt-5" id="mapholder"></div>
</div>

<script>
    var x = document.getElementById("demo")

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError)
        } else {
            x.innerHTML = "Geolocation is not supported by this browser."
        }
    }

    function showPosition(position) {

        // localStorage.lat = position.coords.latitude 
        // localStorage.lon = position.coords.longitude

        var latlon = position.coords.latitude + "," + position.coords.longitude
        var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="
        +latlon+"&zoom=14&size=400x300&key=AIzaSyCnS1rWjJ-nb-MuwUgMECqJnYhS7VYN5XQ"
        document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>"
    }
    //To use this code on your website, get a free API key from Google.
    //Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
        }
    }
</script>

<?php
require_once "templates/footer.php";
?>