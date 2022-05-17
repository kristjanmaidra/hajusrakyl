<template>
    <div class="">
        <div class="w-full h-96">
            <div class="h-full" id="map" ref="map"></div>
        </div>
    </div>
</template>

<script setup>
import { Loader } from "@googlemaps/js-api-loader";
import { ref } from "vue";

let map = ref(null);

const loader = new Loader({
    apiKey: "",
    version: "weekly",

});
loader.load().then(() => {
    let LatLng = { lat: 58.24806, lng: 22.50389 };
    map = new google.maps.Map(map.value, {
        zoom: 8,
        center: LatLng,
    });

    let marker = new google.maps.Marker({
            map: map,
        });

    map.addListener('click', (e) => {
        console.log(e.latLng.toJSON());

       marker.setPosition(e.latLng);

       document.getElementById('input-lat').value = e.latLng.toJSON().lat;
       document.getElementById('input-lng').value = e.latLng.toJSON().lng;
    });

//         placeMarkerAndPanTo(e.latLng, map);
//     })
// function placeMarkerAndPanTo(latLng, map) {
//   new google.maps.Marker({
//     position: latLng,
//     map: map,
//   });
//   map.panTo(latLng);
// }

});
</script>