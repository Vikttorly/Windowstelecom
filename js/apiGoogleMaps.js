function initMap() {
  var myLatLng = {lat: 8.915890, lng: -67.433300};

  var map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 17,
    zoomControl: false,
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,
    rotateControl: false,
    scrollwheel: false
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'WindowsTelecom',
    animation: google.maps.Animation.BOUNCE
  });

  var styles = [
  {
    stylers: [
      { hue: "#92c54f" },
      { saturation: -20 }
    ]
  },{
    featureType: "road",
    elementType: "geometry",
    stylers: [
      { lightness: 100 },
      { visibility: "simplified" }
    ]
  },{
    featureType: "road",
    elementType: "labels",
    stylers: [
      { visibility: "off" }
    ]
  }
];

map.setOptions({styles: styles});

marker.setIcon('images/map2.png');
google.maps.event.addListener(marker, 'click', funcionClick);
}