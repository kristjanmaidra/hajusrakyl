<template>
    <div class="max-w-screen-lg w-full mx-auto mt-12">
        <p class="text-2xl text-gray-700 pb-6">Blog</p>
        <Disclosure class="mb-4" as="div" v-for="(post, index) in posts" :key="index" v-slot="{ open }">
        <DisclosureButton
          class="focus:outline-none flex w-full justify-between rounded-lg bg-purple-100 px-4 py-2 text-left text-sm font-medium text-purple-900 hover:bg-purple-200 focus-visible:ring focus-visible:ring-purple-500 focus-visible:ring-opacity-75"
        >
          <div>
              <p class="text-lg">{{ post.title }}</p>
              <p>{{post.description}}</p>
          </div>
            <div>
                <ChevronUpIcon
                    :class="open ? 'rotate-180 transform' : ''"
                    class="h-5 w-5 text-purple-500"
                 />
            </div>
        </DisclosureButton>
        <DisclosurePanel class="px-4 pt-4 pb-2 text-sm text-gray-500">
          If you're unhappy with your purchase for any reason, email us within
          90 days and we'll refund you in full, no questions asked.
        </DisclosurePanel>
      </Disclosure>
    </div>   
</template>

<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon } from '@heroicons/react/solid'

const props = defineProps({
    posts: {
        type: Array, 
        default: null,
    },
});
</script>