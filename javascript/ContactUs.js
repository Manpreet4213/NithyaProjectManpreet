function intializeMap(){
  var location = {lat: 43.6532, lng: 79.3832};
  var map = new google.maps.Map(
      document.getElementById("map"), {zoom: 14, center:location});
  var marker = new google.maps.Marker({position: location, map: map});
}
