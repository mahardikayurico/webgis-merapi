<?php
$url=file_get_contents("http://localhost:8080/geoserver/Indonesia/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=Indonesia%3ADesa_terdampak&outputFormat=application%2Fjson"); 
# url yang ada di dalam ("") itu link address dari halaman GeoJSON.. jangan luap hapus bagian &maxFeatures=50
echo($url);
?>

