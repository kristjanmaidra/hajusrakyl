<template>
    <div class="w-full h-96 flex">
                <form class="p-10 bg-gray-200" @submit.prevent="submit">
                    <Label for="name">Name</Label>
                    <Input type="text" v-model="form.name" />
                    <Label for="latitude">Latitude</Label>
                    <Input type="text" id="input-lat" v-model="form.latitude" />
                    <Label for="longitude">Longitude</Label>
                    <Input type="text" id="input-lng" v-model="form.longitude" />
                    <Label for="description">Description</Label>
                    <Input type="text" v-model="form.description" />
                    <br>
                    <button class="rounded mt-3 bg-gray-800 text-white font-bold uppercase px-2 py-1" type="submit">Save</button>
                </form>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { inject } from '@vue/runtime-core';

const props = defineProps({
    map:{
        type: Object,
        default: null
    }
})
const route = inject('route')
const form = useForm({
      id: props.map.id,
      name: props.map.name,
      latitude: props.map.latitude,
      longitude: props.map.longitude,
      description: props.map.description,
    });

const submit = () => {
    form.post(route("map.update", props.map.id));
}
</script>