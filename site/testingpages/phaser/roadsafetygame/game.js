function initMap() {
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    // Set mapTypeId to google.maps.MapTypeId.SATELLITE in order
    // to activate satellite imagery.
    mapTypeId: google.maps.MapTypeId.SATELLITE,
    scrollwheel: true,
    zoom: 8,
    streetViewControl: true
  });
}