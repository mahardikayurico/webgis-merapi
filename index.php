<!DOCTYPE html>
<html>
<head> <!-- untuk meta description, keywords, dan author bisa gantu dan di sesuaikan tapi yang meta charset sama viewport jangan di ganti -->
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name='description' content='WebGIS Visualisasi untuk mendukung pengurangan risiko bencana Gunung Merapi '/>
<meta name='keywords' content='WebGIS, WebGIS untuk mendukung pengurangan risiko bencana Gunung Merapi, WebGIS Indoensia'/>
<meta name='Author' content='Mahardika Yurico Billian'/> 
<title>WebGIS Pengurangan Risiko Bencana Gunung Merapi</title> <!-- title bisa di sesuaikan dengan nama judul WebGIS yang di inginkan -->
<link rel="stylesheet" href="leaflet/leaflet.css" /> <!-- memanggil css di folder leaflet -->
<link rel="stylesheet" href="css/style.css" /> <!-- memanggil css style -->
<link rel="stylesheet" href="leaflet/leaflet-search-master/src/leaflet-search.css"/>
<link rel="stylesheet" href="leaflet/leaflet.defaultextent-master/dist/leaflet.defaultextent.css" />
<script src="leaflet/leaflet-ajax/dist/leaflet.ajax.js"></script>
<script src="leaflet/leaflet-search-master/src/leaflet-search.js"></script>
<script src="leaflet/leaflet.defaultextent-master/dist/leaflet.defaultextent.js"></script>
<script src="leaflet/leaflet.js"></script> <!-- memanggil leaflet.js di folder leaflet -->
<script src="js/jquery-3.1.0.min.js"></script> <!-- memanggil jquery di folder js -->
<script src="leaflet/leaflet-providers-master/leaflet-providers.js"></script> <!-- memanggil leaflet-providers.js di folder leaflet provider -->
</head>
<body>
<div id="map"> <!-- ini id="map" bisa di ganti dengan nama yang di inginkan -->
<script>
// MENGATUR TITIK KOORDINAT TITIK TENGAN & LEVEL ZOOM PADA BASEMAP
var map = L.map('map').setView([-7.64771,110.46793], 10);

// PILIHAN BASEMAP YANG AKAN DITAMPILKAN
var baseLayers = {  
  'Esri.WorldTopoMap': L.tileLayer.provider('Esri.WorldTopoMap').addTo(map),
  'Esri WorldImagery': L.tileLayer.provider('Esri.WorldImagery')
};

// MENAMPILKAN TOOLS UNTUK MEMILIH BASEMAP
L.control.layers(baseLayers,{}).addTo(map);
// MENAMPILKAN SKALA
L.control.scale({imperial: false}).addTo(map);

// ------------------- VECTOR ----------------------------
// Layer merapi
$.ajax({ // ini perintah syntax ajax untuk memanggil vektor
    type: 'POST',
    url: 'layer/layer_krb.php', // INI memanggil link request_bali yang sebelumnya telah di buat
    dataType: "json", 
 success: function(response){
   var data=response; 
   L.geoJson(data,{
     style: function(feature){
    var Style1
    return { color: "#cc3f39", weight: 1, opacity: 1 }; // ini adalah style yang akan digunakan
    },
      // MENAMPILKAN POPUP DENGAN ISI BERDASARKAN ATRIBUT KAB_KOTA
      onEachFeature: function( feature, layer ){
        layer.bindPopup( "<center>" + feature.properties.krb + "</center>")
      }
      }).addTo(map);  // di akhir selalu di akhiri dengan perintah ini karena objek akan ditambahkan ke map
    }
});
$.ajax({ // ini perintah syntax ajax untuk memanggil vektor
    type: 'FeatureCollection',
    url: 'layer/layer_barak.php', // INI memanggil link request_bali yang sebelumnya telah di buat
    dataType: "json", 
 success: function(response){
   var data=response; 
   L.geoJson(data,{
     style: function(feature){
    var Style1
    return { color: "#cc3f39", weight: 1, opacity: 1 }; // ini adalah style yang akan digunakan
    },
      // MENAMPILKAN POPUP DENGAN ISI BERDASARKAN ATRIBUT KAB_KOTA
      onEachFeature: function( feature, layer ){
        layer.bindPopup( "<center>" + feature.properties.krb + "</center>")
      }
      }).addTo(map);  // di akhir selalu di akhiri dengan perintah ini karena objek akan ditambahkan ke map
    }
});
$.ajax({ // ini perintah syntax ajax untuk memanggil vektor
    type: 'POST',
    url: 'layer/layer_terdampak.php', // INI memanggil link request_bali yang sebelumnya telah di buat
    dataType: "json", 
 success: function(response){
   var data=response; 
   L.geoJson(data,{
     style: function(feature){
    var Style1
    return { color: "#cc3f39", weight: 1, opacity: 1 }; // ini adalah style yang akan digunakan
    },
      // MENAMPILKAN POPUP DENGAN ISI BERDASARKAN ATRIBUT KAB_KOTA
      onEachFeature: function( feature, layer ){
        layer.bindPopup( "<center>" + feature.properties.krb + "</center>")
      }
      }).addTo(map);  // di akhir selalu di akhiri dengan perintah ini karena objek akan ditambahkan ke map
    }
});
$.ajax({ // ini perintah syntax ajax untuk memanggil vektor
    type: 'POST',
    url: 'layer/layer_radius.php', // INI memanggil link request_bali yang sebelumnya telah di buat
    dataType: "json", 
 success: function(response){
   var data=response; 
   L.geoJson(data,{
     style: function(feature){
    var Style1
    return { color: "#cc3f39", weight: 1, opacity: 1 }; // ini adalah style yang akan digunakan
    },
      // MENAMPILKAN POPUP DENGAN ISI BERDASARKAN ATRIBUT KAB_KOTA
      onEachFeature: function( feature, layer ){
        layer.bindPopup( "<center>" + feature.properties.krb + "</center>")
      }
      }).addTo(map);  // di akhir selalu di akhiri dengan perintah ini karena objek akan ditambahkan ke map
    }
});
</script>
</div>  
</body>
</html>
</body>
</html>