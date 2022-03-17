// Como parámetros se indica los puntos y el origen
function calcularRuta(stations, locationOrigin) {
  // Variable del punto inicial. Se duplica el objeto
  var originPoint = JSON.parse(JSON.stringify(locationOrigin));;
  // Variable para guardar los puntos ordenados
  let stationsSorted = [];

  /*
  stations = calcularDistancia(stations, originPoint);
  console.log(stations);*/

  while (stations.length > 1) {  
    stations = calcularDistancia(stations, originPoint);

    stationsSorted.push(stations.shift());
    // stations.splice(0, 1)
    /* stations = stations.filter(function(station) {
      return station.name !== stations[0].name;
    });*/
    originPoint.lat = stationsSorted[stationsSorted.length - 1].lat;
    originPoint.lng = stationsSorted[stationsSorted.length - 1].lng;
    originPoint.name = stationsSorted[stationsSorted.length - 1].name;
  }

  stationsSorted.push(stations.shift());
  console.log(stationsSorted);

  // Se devuelve los puntos ordenados
  return stationsSorted;
}

function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
  var R = 6371; // Radio de la tierra en km
  var dLat = deg2rad(lat2 - lat1);
  var dLon = deg2rad(lon2 - lon1);
  var a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(deg2rad(lat1)) *
      Math.cos(deg2rad(lat2)) *
      Math.sin(dLon / 2) *
      Math.sin(dLon / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c; // Distancia en km
  return d; // Devolvemos la distancia
}

function deg2rad(deg) {
  //Función para convertir grados a radianes
  return deg * (Math.PI / 180);
}

function calcularDistancia(stations, originPoint) {
  for (let i = 0; i < stations.length; i++) {
    let distance = getDistanceFromLatLonInKm(
      originPoint.lat,
      originPoint.lng,
      stations[i].lat,
      stations[i].lng
    );

    // Adjuntar la distancia devuelta de la función a los elementos de la matriz
    stations[i].distance = distance;
  }

  stations.sort(function (a, b) {
    return a.distance - b.distance;
  });
  
  return stations;
}