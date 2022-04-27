<template>
    <div>
        <div class="w-full h-96">
        <div class="h-full w-full" id="map" ref="map"></div>
        <div class="w-full h-96 bg-red-200">
            <form action="">
                <label for="Latitude"></label>
                <input type="text">
            </form>
        </div>
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
    let myLatLng = { lat: 58.24806, lng: 22.50389 };
    map = new google.maps.Map(map.value, {
        zoom: 8,
        center: myLatLng,
    });
    map.addListener('click', (e) => {
        console.log(e);
        console.log(e.latLng.toJSON());

        new google.maps.Marker({
            position: e.LatLng,
            map: map,
        });
    })

window.initMap = initMap;
});
</script>