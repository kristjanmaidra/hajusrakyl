<template>
    <div class="max-w-screen-lg w-full mx-auto mt-12">
        <div class="flex flex-col w-full">
            <form class="flex flex-col gap-6" @submit.prevent="submit">
                <div class="flex flex-col">
                    <label for="tile">Title</label>
                    <input class="rounded active:border-inherit" name="description" v-model="form.title" type="text">
                    <textarea v-model="form.description" name="description" id=""></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="">Description</label>
                    <textarea name="description" id="" ></textarea>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default { layoutName: "Authenticated" };
</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3'


const form = useForm({
      name: null,
      description: null,
    });

    function storeTopic() {
      form.post('/topics')
    }

</script>