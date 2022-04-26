<template>
    <div class="w-full h-96">
        <div class="h-full w-full" id="map" ref="map"></div>
    </div>
</template>

<script setup>
import { Loader } from "@googlemaps/js-api-loader";
import { ref } from "vue";

let map = ref(null);

const loader = new Loader({
    apiKey: "AIzaSyB0WTGG9d8la0rFb6uCgkSgmURvwiSOMsg",
    version: "weekly",
});
loader.load().then(() => {
    let myLatLng = { lat: 58.24806, lng: 22.50389 };
    map = new google.maps.Map(map.value, {
        zoom: 8,
        center: myLatLng,
    });
});
</script>