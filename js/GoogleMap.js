var map;
var map_center;
var path_coords = [{
  lat: 55.77248,
  lng: 37.67913
}, {
  lat: 55.77249,
  lng: 37.67866
}, {
  lat: 55.77558,
  lng: 37.67776
}, {
  lat: 55.77594,
  lng: 37.67701
}, {
  lat: 55.777,
  lng: 37.67977
}];
var path_bounds;

function initialize() {
  map_center = new google.maps.LatLng(55.774593, 37.679367);
  var mapCanvas = document.getElementById('map');
  var mapOptions = {
    center: map_center,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(mapCanvas, mapOptions);
  addRoute(map);
}

function addMarker(label, location, map) {
  var marker = new google.maps.Marker({
    position: location,
    label: label,
    map: map
  });
}

function addRoute(map) {
  var lineSymbol = {
    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
  };
  var flightPath = new google.maps.Polyline({
    path: path_coords,
    geodesic: true,
    icons: [{
      icon: lineSymbol,
      offset: '100%'
    }],
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  path_bounds = new google.maps.LatLngBounds();
  for (var i = 0; i < path_coords.length; i++) {
    addMarker((i + 1).toString(), path_coords[i], map);
    path_bounds.extend(
      new google.maps.LatLng(
        path_coords[i].lat,
        path_coords[i].lng));
  }

  flightPath.setMap(map);
  resize();

  google.maps.event.addDomListener(window, 'resize',
    resize);
}

function resize() {
  map.setCenter(map_center);
  map.fitBounds(path_bounds);
}

initialize();