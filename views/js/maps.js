var geocoder;
var map;

function initialize() {
    geocoder = new google.maps.Geocoder();
    $("#map-canvas").toggle();
    codeAddress('bra001');
}

function codeAddress(Station_id) {
    console.log("set new marker");
    init_sports_menu(); 
    function init_sports_menu(){
	$.get("http://127.0.0.1:8080/api/latlong/bra001",
            function(data){
                setmarker(data);
                
            }
	);
    }
}

function setmarker(station_object){
    console.log(parseFloat(station_object.latlong[0].measure_value));
    var myLatlng = new google.maps.LatLng( parseFloat(station_object.latlong[1].measure_value), parseFloat(station_object.latlong[0].measure_value));
    var mapOptions = {
    zoom: 2,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: station_object.latlong[1].station_id,
      animation: google.maps.Animation.DROP
  });

    function toggleBounce() {
        if (marker.getAnimation() != null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
    map.setCenter(marker.getPosition());
    google.maps.event.addListener(marker, 'click', toggleBounce);
}
google.maps.event.addDomListener(window, 'load', initialize);

$(document).ready(function(){
    $("#hide_show").click(function(){
        $("#grapharea").toggle();
        $("#map-canvas").toggle();
    });
});
