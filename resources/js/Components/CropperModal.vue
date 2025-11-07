<script setup>
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

import { Cropper, CircleStencil } from "vue-advanced-cropper";
import "vue-advanced-cropper/dist/style.css";

import Close from "vue-material-design-icons/Close.vue";
import Plus from "vue-material-design-icons/Plus.vue";

import { isImage } from "@/helpers.js";

import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isCropperModal } = storeToRefs(useGeneral);

const emit = defineEmits(["showModal"]);

let fileInput = ref(null);
let cropper = ref(null);
let uploadedImage = ref(null);
let croppedImageData = {
    file: null,
    imageUrl: null,
    height: null,
    width: null,
    left: null,
    top: null,
};

const getUploadedImage = (e) => {
    const file = e.target.files[0];

    if (isImage(file)) {
        uploadedImage.value = URL.createObjectURL(file);
    }
};

const crop = () => {
    const { coordinates, canvas } = cropper.value.getResult();
    if (!canvas) return;
    croppedImageData.imageUrl = canvas.toDataURL();

    let data = new FormData();
    data.append("image", fileInput.value.files[0]);
    data.append("height", coordinates.height);
    data.append("width", coordinates.width);
    data.append("left", coordinates.left);
    data.append("top", coordinates.top);

    router.post(route("user.updateImage"), data, {
        only: ['user'],
        preserveState: false,
    });

    isCropperModal.value = false;
};
</script>

<template>
    <div class="fixed z-50">
        <div class="fixed inset-0 bg-white bg-opacity-60">
            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div
                    class="flex min-h-full flex-col items-center justify-center py-2"
                >
                    <div
                        class="max-w-xl transform overflow-hidden rounded-lg bg-white shadow-2xl transition-all"
                    >
                        <div
                            class="flex items-center border-b border-b-gray-200 py-4"
                        >
                            <div
                                class="w-full text-center text-[1.375rem] font-extrabold"
                            >
                                Update profile picture
                            </div>
                            <div
                                @click="isCropperModal = false"
                                class="absolute right-3 cursor-pointer rounded-full bg-gray-200 p-1.5 hover:bg-gray-300"
                            >
                                <Close :size="28" fillColor="#5E6771" />
                            </div>
                        </div>
                        <div class="flex items-center bg-white px-4 pb-4">
                            <div>
                                <div class="my-4">
                                    <label
                                        for="image"
                                        class="flex w-full cursor-pointer items-center justify-center rounded-lg bg-[#E7F3FF] p-2 font-bold text-[#1977F2] hover:bg-[#DBE7F2]"
                                    >
                                        <Plus :size="20" /> Upload photo
                                    </label>
                                    <input
                                        type="file"
                                        id="image"
                                        ref="fileInput"
                                        class="hidden"
                                        @change="getUploadedImage"
                                    />
                                </div>
                                <div class="mx-auto w-[21.875rem]">
                                    <Cropper
                                        class="object-cover"
                                        ref="cropper"
                                        :stencil-component="CircleStencil"
                                        :src="uploadedImage"
                                    />
                                </div>
                                <div
                                    class="flex gap-4"
                                    :class="uploadedImage ? ' pt-4' : ''"
                                >
                                    <button
                                        @click="isCropperModal = false"
                                        type="button"
                                        class="w-full justify-center rounded-md py-2 font-bold text-gray-600 hover:bg-gray-200 hover:text-gray-800 hover:shadow-sm focus:outline-none focus:ring-0"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        v-if="uploadedImage"
                                        @click="crop"
                                        type="button"
                                        class="w-full rounded-md bg-blue-500 py-2 font-bold text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-0"
                                    >
                                        Crop image
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
