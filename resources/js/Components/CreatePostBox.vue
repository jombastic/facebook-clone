<script setup>
import { toRefs } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

import VideoImage from "vue-material-design-icons/VideoImage.vue";
import Image from "vue-material-design-icons/Image.vue";
import EmoticonOutline from "vue-material-design-icons/EmoticonOutline.vue";

import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isPostOverlay } = storeToRefs(useGeneral);

const props = defineProps({
    image: String,
    placeholder: String,
});

const { image, placeholder } = toRefs(props);

const user = usePage().props.auth.user;

const buttons = [
    { icon: VideoImage, color: "#F12848", text: "Live Video" },
    { icon: Image, color: "#43BE62", text: "Photo/Video" },
    { icon: EmoticonOutline, color: "#F8B927", text: "Feeling/Activity" },
];
</script>

<template>
    <div
        id="CreatePostBox"
        class="mt-4 w-full rounded-lg bg-white px-3 shadow-md"
    >
        <div class="flex items-center border-b py-3">
            <Link :href="route('user.show', { id: user.id })" class="mr-2">
                <img
                    loading="lazy"
                    decoding="async"
                    :src="image"
                    class="ml-1 max-h-[2.25rem] min-w-[2.25rem] rounded-full"
                />
            </Link>
            <div
                @click="isPostOverlay = true"
                class="flex w-full cursor-pointer items-center justify-start rounded-full bg-[#EFF2F5] p-2"
            >
                <div class="pl-2 text-left">{{ placeholder }}</div>
            </div>
        </div>
        <div class="flex items-center border-b py-3">
            <template v-for="(button, index) in buttons" :key="index">
                <button
                    class="mx-1 flex w-full cursor-pointer items-center justify-normal rounded-lg p-1 hover:bg-[#F2F2F2]"
                >
                    <component
                        :is="button.icon"
                        :size="35"
                        :fillColor="button.color"
                    />
                    <div class="font-bold text-[#6F7275]">
                        {{ button.text }}
                    </div>
                </button>
            </template>
        </div>
    </div>
</template>
