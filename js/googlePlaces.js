// Initialize the Google Places Autocomplete
function initAutocomplete() {
  var input = document.getElementById("location-input");
  var autocomplete = new google.maps.places.Autocomplete(input);
}

// Load the Google Places Autocomplete API
function loadScript() {
  var script = document.createElement("script");
  script.src =
    "https://maps.googleapis.com/maps/api/js?key=AIzaSyD13FeUZZOZmswtOLGnbWCNcCvSGzq7Oh4&libraries=places&callback=initAutocomplete";
  document.body.appendChild(script);
}

// Trigger loading the Google Places Autocomplete API
window.onload = loadScript;
