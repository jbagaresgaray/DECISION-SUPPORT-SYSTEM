function initialize() {

  var map = new google.maps.Map(document.getElementById('map-canvas'), {
    center: new google.maps.LatLng(10, -140),
    zoom: 3
  });

  var layer = new google.maps.FusionTablesLayer({
    query: {
      select: 'location',
      from: '1xWyeuAhIFK_aED1ikkQEGmR8mINSCJO9Vq-BPQ'
    },
    heatmap: {
      enabled: true
    }
  });

  layer.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);