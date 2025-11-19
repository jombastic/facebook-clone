<script setup>
import { storeToRefs } from "pinia";
import { usePostStore } from "@/stores/post";
import { watch } from "vue";
import { useForm } from 'laravel-precognition-vue-inertia';

import { useGeneralStore } from "@/stores/general";
const useGeneral = useGeneralStore();
const { isPostOverlay } = storeToRefs(useGeneral);

const usePost = usePostStore();
const { text, image, imageDisplay, error } = storeToRefs(usePost);

const form = useForm("post", route("post.store"), {
    text: text.value ?? "",
    image: image.value ?? null,
});

watch(text, (value) => {
    form.text = value ?? "";
});

watch(image, (value) => {
    form.image = value ?? null;
});

const createPost = () => {
    console.log(form.image)
    form.submit({
        only: ["latestPost"],
        preserveScroll: true,
        onError: (errors) => {
            errors && errors.text ? (error.value = errors.text) : "";
            errors && errors.image ? (error.value = errors.image) : "";
        },
        onSuccess: () => {
            text.value = null;
            image.value = null;
            imageDisplay.value = null;
            error.value = null;
            isPostOverlay.value = null;
        },
    });
};
</script>

<template>
    <div v-if="error">
        <div class="mt-3 w-full rounded-lg bg-red-100 text-center text-red-700">
            <div class="p-0.5">
                {{ error }}
            </div>
        </div>
    </div>
    <button
        @click="
            form.validate({
                only: ['text', 'image'],
                onSuccess: (response) => createPost(),
            })
        "
        class="mt-3 w-full rounded-lg bg-blue-500 p-1.5 font-extrabold text-white hover:bg-blue-600"
    >
        Post
    </button>
</template>
