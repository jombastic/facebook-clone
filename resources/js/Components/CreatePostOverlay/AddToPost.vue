<script setup>
import EmoticonOutline from "vue-material-design-icons/EmoticonOutline.vue";
import Image from "vue-material-design-icons/Image.vue";
import VideoImage from "vue-material-design-icons/VideoImage.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";

import { usePostStore } from "@/stores/post";
import { storeToRefs } from "pinia";
import { watch, ref } from "vue";

const usePost = usePostStore();
const { image } = storeToRefs(usePost);
const { getUploadedImage } = usePostStore();

const imageInput = ref(null);

watch(image, (newVal) => {
    if (newVal === null) {
        imageInput.value.value = "";
    }
});

const buttons = [
    { icon: Image, color: "#43BE62" },
    { icon: EmoticonOutline, color: "#F8B927" },
    { icon: VideoImage, color: "#F12848" },
    { icon: DotsHorizontal, color: "#050505" },
];
</script>

<template>
    <div
        class="mt-4 flex items-center justify-between rounded-xl border-2 shadow-sm"
    >
        <div class="p-4 font-extrabold">Add to your post</div>
        <div class="flex items-center">
            <label
                for="image"
                class="cursor-pointer rounded-full p-2 hover:bg-gray-200"
            >
                <component
                    :is="Image"
                    :size="27"
                    :fillColor="buttons[0].color"
                />
            </label>
            <input
                ref="imageInput"
                @input="getUploadedImage($event)"
                type="file"
                id="image"
                class="hidden"
            />
            <button
                v-for="(button, index) in buttons.slice(1)"
                :key="index"
                class="cursor-pointer rounded-full p-2 hover:bg-gray-200"
            >
                <component
                    :is="button.icon"
                    :size="27"
                    :fillColor="button.color"
                />
            </button>
        </div>
    </div>
</template>
