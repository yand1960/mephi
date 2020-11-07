function geo_distance(p1, p2, lat1, lon1, lat2, lon2) {
	var lat1 = p1.latitude;
	var lon1 = p1.longitude;
	var lat2 = p2.latitude;
	var lon2 = p2.longitude;
	var R = 6371; // Radius of the earth in km
	var dLat = deg2rad(lat2-lat1); // deg2rad below
	var dLon = deg2rad(lon2-lon1);
	var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	var d = R * c; // Distance in km
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}





var geo = {
  'listPoints': function(cb) {
    fetch('ИЧListShopsService.php').then(res => res.json())
      .then(res => {
        cb(res);
      });
  },
  'myPosition': function(cb) {
    navigator.geolocation.getCurrentPosition(res => {
      cb({
        longitude: res.coords.longitude,
        latitude: res.coords.latitude
      })
    })
  },
  'distance2points': function(cb) {
    geo.myPosition(p1 => {
      geo.listPoints(ps => {
        cb(ps.map(p2 => {
          p2.distance = geo_distance(p1, p2);
          return p2;
        }))
      })
    })
  }
}
