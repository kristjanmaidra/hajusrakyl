<template>
    <div class="max-w-screen-lg w-full mx-auto mt-12">
        <p>Blog</p>
    </div>
    
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon } from '@heroicons/react/solid'

const props = defineProps({
    posts: Array,
    deafult: null
})
</script>