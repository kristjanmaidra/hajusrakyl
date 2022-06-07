<template>
    <div class="">
        <div class="w-full h-96">
            <div class="h-full" id="map" ref="map"></div>
            <div class="w-full h-96 flex">
                <form class="p-10 bg-gray-200" @submit.prevent="submit">
                    <Label for="name">Name</Label>
                    <Input type="text" v-model="form.name" />
                    <Label for="latitude">Latitude</Label>
                    <Input type="text"  name="lat" id="input-lat" v-model="form.latitude" />
                    <Label for="longitude">Longitude</Label>
                    <Input type="text"  name="lng" id="input-lng" v-model="form.longitude" />
                    <Label for="description">Description</Label>
                    <Input type="text" v-model="form.description" />
                    <br>
                    <button class="rounded mt-3 bg-gray-800 text-white font-bold uppercase px-2 py-1" type="submit">Save</button>
                </form>
                <div class="m-4">
                    <table class="">
                        <thead class="">
                            <tr class=" text-center font-bold">
                                <td class="p-3">Name</td>
                                <td class="p-3">Latitude</td>
                                <td class="p-3">Longitude</td>
                                <td class="p-3">Description</td>
                            </tr>
                        </thead>
                        <tr v-for="map in maps" :key="map.id" class="">
                            <td class="border px-6 py-1">{{ map.name }}</td>
                            <td class="border px-6 py-1">{{ map.longitude }}</td>
                            <td class="border px-6 py-1">{{ map.latitude }}</td>
                            <td class="border px-6 py-1">{{ map.description }}</td>
                            <td class=" flex gap-2 py-3 items-center justify-center">
                                <Link class="bg-gray-800 text-white font-bold text-sm uppercase px-2 py-1 rounded" :href="route('map.edit', map.id)">Edit</Link>
                                <Link class="bg-red-500 text-white font-bold text-sm uppercase px-2 py-1 rounded" as="buttton" method="post" :href="route('map.delete', map.id)">Delete</Link>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { Loader } from "@googlemaps/js-api-loader";
import { ref } from "vue";
import { useForm } from '@inertiajs/inertia-vue3'
import { inject } from '@vue/runtime-core';
import { Link } from "@inertiajs/inertia-vue3"

const route = inject('route')
const props = defineProps({
    maps: {
        type: Array,
        default: null,
    }
})

const form = useForm({
    name: "",
    latitude: "",
    longitude: "",
    description: "",
});

let map = ref(null);
let prevMarker;

const loader = new Loader({
    apiKey: "",
    version: "weekly",

});
loader.load().then(() => {
    let myLatLng = { lat: 58.24806, lng: 22.50389 };
    let gmap = new google.maps.Map(map.value, {
        zoom: 8,
        center: myLatLng,
    });

    gmap.addListener("click", (e) => {
        // console.log(e.latLng.toJSON());

        if (prevMarker) {
            prevMarker.setMap(null);
        }
        let data = e.latLng.toJSON();
        prevMarker = new google.maps.Marker({
            position: data,
    });
    
    

    form.longitude = data.lng;
    form.latitude = data.lat;

    prevMarker.setMap(gmap);
    });
});

const submit = () => {
    form.post(route('map.add'), {
        onSuccess: () => form.reset()
    });
}
</script>