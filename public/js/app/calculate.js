const ubicacionCercana = {
  name: 'Mi casa',
  lat: 36.839922,
  lng: -2.4497194,
};
let stationsSorted = [];
var stations = [
  { lat: 36.8380937415769, lng: -2.451354164303034, name: 'Bombolone' },
  {
    lat: 36.85009476292969,
    lng: -2.4467457663224828,
    name: 'Pastelería del Águila - La Tonta Mona',
  },
  { lat: 36.83933976659666, lng: -2.4601826277867804, name: 'Don Croissant' },
  {
    lat: 36.83979410289659,
    lng: -2.4616328805261736,
    name: 'Confitería Capri',
  },
  {
    lat: 36.86025637738461,
    lng: -2.4447880016370553,
    name: 'Pastelería Mónica',
  },
  {
    lat: 36.85519907724516,
    lng: -2.444838815654999,
    name: 'Taberna El Andaluz',
  },
  {
    lat: 36.85105648587925,
    lng: -2.450457498328358,
    name: 'La Piedra Resto-Bar',
  },
  {
    lat: 36.854688563504176,
    lng: -2.444906487615583,
    name: 'Tango Bar & Restaurante',
  },
  { lat: 36.8410649, lng: -2.4531394, name: 'Bar Hammurabi' },
  { lat: 36.826342, lng: -2.4471747, name: 'Kebab El Rachid' },
  { lat: 36.8221608, lng: -2.4435294, name: 'La Dulce Alianza - Zapillo' },
  { lat: 36.8321486, lng: -2.4465911, name: 'Karbon' },
  { lat: 36.8320403, lng: -2.4464829, name: 'Restaurante La Pérgola' },
  { lat: 36.8416245, lng: -2.4576246, name: 'Heladería Punto Italia' },
  { lat: 36.851193, lng: -2.4509368, name: 'La Flor de Valencia' },
  { lat: 36.8457148, lng: -2.4430354, name: 'Indalpizza Almería' },
  { lat: 36.8390533, lng: -2.4522264, name: 'Scondite Bar' },
  { lat: 36.8386163, lng: -2.4602112, name: 'RAPA NUII' },
  { lat: 36.8393025, lng: -2.4563474, name: 'Pub La Luna' },
  { lat: 36.8501602, lng: -2.4456281, name: 'El Goloso de Almería' },
  { lat: 36.8394445, lng: -2.4499834, name: 'Hamburgueseria Milo' },
  { lat: 36.8404658, lng: -2.4661491, name: 'Milestone Restaurant & Bar' },
  { lat: 36.8392094, lng: -2.4601044, name: 'Fosters Hollywood' },
  { lat: 36.8459134, lng: -2.461032, name: 'Dogar Dogar Kebab - Ramblo' },
  { lat: 36.8420515, lng: -2.4631646, name: 'Goiko' },
  { lat: 36.8381317, lng: -2.4652535, name: 'Bar La Lupe' },
  { lat: 36.8410466, lng: -2.4643361, name: 'La Dulce Alianza - Paseo' },
  { lat: 36.847436, lng: -2.4472742, name: 'El Rincón de Basi' },
  { lat: 36.8379769, lng: -2.4597346, name: 'La Dulce Alianza - Rambla' },
];

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
function calcularDistancia() {
  for (let i = 0; i < stations.length; i++) {
    let distance = getDistanceFromLatLonInKm(
      ubicacionCercana.lat,
      ubicacionCercana.lng,
      stations[i].lat,
      stations[i].lng
    );
    //Attaching returned distance from function to array elements
    stations[i].distance = distance;
  }
  stations.sort(function (a, b) {
    return a.distance - b.distance;
  });
  stationsSorted.push(stations[0]);
}
function calcularPuntos() {
    while (stations.length > 1) {
        calcularDistancia();
        ubicacionCercana.lat = stationsSorted[stationsSorted.length].lat;
        ubicacionCercana.lng = stationsSorted[stationsSorted.length].lng;
        ubicacionCercana.name = stationsSorted[stationsSorted.length].name;
    }
}
