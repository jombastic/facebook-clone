<script setup>
const actions = ["Add Bio", "Edit details", "Add hobbies", "Add feature"];
defineProps({ posts: Object });

import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isImageDisplay } = storeToRefs(useGeneral);
</script>

<template>
    <div id="LeftSection" class="mr-4 mt-4 w-full md:w-5/12">
        <div class="rounded-lg bg-white p-3 shadow-lg">
            <div class="pb-2 text-xl font-extrabold">Intro</div>
            <template v-for="action in actions" :key="action">
                <div class="pb-5">
                    <button
                        class="w-full rounded-lg bg-gray-200 p-2 font-bold hover:bg-gray-300"
                    >
                        {{ action }}
                    </button>
                </div>
            </template>
        </div>
        <div class="mt-4 rounded-lg bg-white p-3 shadow-lg">
            <div class="pb-2 text-xl font-extrabold">Photos</div>
            <div class="flex w-full flex-wrap items-center justify-start">
                <template v-for="photo in posts" :key="photo">
                    <img
                        v-if="photo.image"
                        @click="isImageDisplay = photo.image"
                        :src="photo.image"
                        class="aspect-square w-1/3 cursor-pointer rounded-lg object-cover p-1"
                    />
                </template>
            </div>
        </div>
    </div>
</template>
