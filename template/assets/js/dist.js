
//calculate distance
function haversine_distance(lat1, lat2, lng1, lng2) {
      var R =  6378137; // Radius of the Earth in miles
      var rlat1 = lat1 * (Math.PI/180); // Convert degrees to radians
      var rlat2 = lat2 * (Math.PI/180); // Convert degrees to radians
      var difflat = rlat2-rlat1; // Radian difference (latitudes)
      var difflon = (lng1-lng2) * (Math.PI/180); // Radian difference (longitudes)

      var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
      return d;
    }
