<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

import Close from "vue-material-design-icons/Close.vue";
import AddToPost from "./CreatePostOverlay/AddToPost.vue";
import UserSection from "./CreatePostOverlay/UserSection.vue";
import TextForm from "./CreatePostOverlay/TextForm.vue";

import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isPostOverlay } = storeToRefs(useGeneral);

import { usePostStore } from "@/stores/post";
const usePost = usePostStore();
const { text, image, imageDisplay, error } = storeToRefs(usePost);

const emit = defineEmits(["showModal"]);

const form = reactive({
    text,
    image,
});

const createPost = () => {
    router.post(route("post.store"), form, {
        forceFormData: true,
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
            emit("showModal", false);
        },
    });
};
</script>

<template>
    <div
        id="CreatePostsOverlay"
        class="fixed left-0 top-0 z-50 h-full w-full bg-white bg-opacity-70"
    >
        <div class="grid h-screen place-items-center p-4">
            <div
                class="mx-auto w-full max-w-[37.5rem] rounded-xl bg-white shadow-xl"
            >
                <div class="relative mx-1 my-3.5 flex items-center">
                    <div
                        class="w-full text-center text-[1.375rem] font-extrabold"
                    >
                        Create Post
                    </div>
                    <div
                        @click="isPostOverlay = false"
                        class="absolute right-3 cursor-pointer rounded-full bg-gray-200 p-1.5 hover:bg-gray-300"
                    >
                        <Close :size="20" fillColor="#5E6771" />
                    </div>
                </div>
                <div class="border-t border-t-gray-300">
                    <div class="p-4">
                        <UserSection />

                        <TextForm />

                        <AddToPost />
                        <div v-if="error">
                            <div
                                class="mt-3 w-full rounded-lg bg-red-100 text-center text-red-700"
                            >
                                <div class="p-0.5">
                                    {{ error }}
                                </div>
                            </div>
                        </div>
                        <button
                            @click="createPost"
                            class="mt-3 w-full rounded-lg bg-blue-500 p-1.5 font-extrabold text-white hover:bg-blue-600"
                        >
                            Post
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
