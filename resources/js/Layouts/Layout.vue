<template>
<div class="min-h-screen flex flex-col">
    <nav class="h-12 bg-gray-700">
        <div class="shrink-0 flex align-items-center gap-2 justify-center">
            <Link :href="route('weather.index')">
                <p class="text-white">Weather</p>
            </Link>
            <Link :href="route('blog.index')">
                <p class="text-white">Blog</p>
            </Link>
            <Link :href="route('map.index')">
                <p class="text-white">Map</p>
            </Link>
        </div>
    </nav>
    <main class="font-sans antialiased flex flex-col flex-1">
        <slot></slot>
    </main>
</div>
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

</script>
