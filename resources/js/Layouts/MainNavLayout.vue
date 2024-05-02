<script setup>
import CropperModal from "@/Components/CropperModal.vue";
import NavLeft from "@/Components/Nav/NavLeft.vue";
import NavCenter from "@/Components/Nav/NavCenter.vue";
import NavRight from "@/Components/Nav/NavRight.vue";
import ImageDisplay from "@/Components/ImageDisplay.vue";
import CreatePostOverlay from "@/Components/CreatePostOverlay.vue";

import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isPostOverlay, isCropperModal, isImageDisplay } =
    storeToRefs(useGeneral);
</script>

<template>
    <div
        id="MainNav"
        class="fixed z-50 w-full flex items-center justify-between h-[3.5rem] bg-white shadow-xl border-b"
    >
        <NavLeft />

        <NavCenter />
        <div class="flex items-center justify-end w-2/12 mr-4">
            <NavRight />
        </div>
    </div>
    <slot />

    <CreatePostOverlay
        v-if="isPostOverlay"
        @showModal="isPostOverlay = false"
    />

    <CropperModal v-if="isCropperModal" @showModal="isCropperModal = false" />

    <ImageDisplay v-if="isImageDisplay" />
</template>
