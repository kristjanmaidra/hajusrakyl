<template>
     <form class="flex flex-col w-full max-w-md gap-6" @submit.prevent="submit">
                <div class="flex flex-col">
                    <label for="tile">Add Comment</label>
                    <Input class="rounded active:border-inherit" name="comment" v-model="form.comment" type="text" />
                </div>
                <button class="rounded w-full bg-gray-800 text-white font-bold uppercase px-2 py-1" type="submit">Submit</button>
            </form>
</template>
<script>
export default { layoutName: "Authenticated" };
</script>
<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
import { inject } from '@vue/runtime-core';

const route = inject('route')
const props = defineProps({
    blog: {
        type: Object,
    }
})

const form = useForm({
      comment: "",
    });

const submit = () => {
    form.post(route('comment.add'))
}
</script>