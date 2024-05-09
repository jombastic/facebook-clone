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
        class="w-full bg-white rounded-lg px-3 mt-4 shadow-md"
    >
        <div class="flex items-center py-3 border-b">
            <Link :href="route('user.show', { id: user.id })" class="mr-2">
                <img
                    :src="image"
                    class="rounded-full ml-1 min-w-[2.25rem] max-h-[2.25rem]"
                />
            </Link>
            <div
                @click="isPostOverlay = true"
                class="flex items-center justify-start bg-[#EFF2F5] p-2 rounded-full w-full cursor-pointer"
            >
                <div class="text-left pl-2">{{ placeholder }}</div>
            </div>
        </div>
        <div class="flex items-center py-3 border-b">
            <template v-for="(button, index) in buttons" :key="index">
                <button
                    class="flex items-center justify-normal p-1 hover:bg-[#F2F2F2] w-full rounded-lg mx-1 cursor-pointer"
                >
                    <component
                        :is="button.icon"
                        :size="35"
                        :fillColor="button.color"
                    />
                    <div class="text-[#6F7275] font-bold">
                        {{ button.text }}
                    </div>
                </button>
            </template>
        </div>
    </div>
</template>
