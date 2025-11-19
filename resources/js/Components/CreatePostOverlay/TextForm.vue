<script setup>
import Close from "vue-material-design-icons/Close.vue";

import { usePostStore } from "@/stores/post";
import { storeToRefs } from "pinia";
const usePost = usePostStore();
const { clearImage } = usePostStore();
const { text, image, imageDisplay } = storeToRefs(usePost);
</script>

<template>
    <form id="textForm" class="max-h-[21.875rem] overflow-auto">
        <textarea
            v-model="text"
            cols="30"
            rows="3"
            class="mt-4 w-full border-0 text-[1.375rem] focus:ring-0"
            placeholder="What's on your mind"
        ></textarea>
        <div
            v-if="image"
            class="relative rounded-lg border border-gray-300 p-2"
        >
            <Close
                @click="clearImage"
                class="absolute right-2 m-2 cursor-pointer rounded-full border bg-white p-0.5"
                :size="24"
                fillColor="#5E6771"
            />
            <img :src="imageDisplay" class="mx-auto rounded-lg" />
        </div>
    </form>
</template>
