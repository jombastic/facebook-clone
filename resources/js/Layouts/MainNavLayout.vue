<script setup>
import NavMain from "@/Components/Nav/NavMain.vue";
import CropperModal from "@/Components/CropperModal.vue";
import ImageDisplay from "@/Components/ImageDisplay.vue";
import CreatePostOverlay from "@/Components/CreatePostOverlay.vue";

import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isPostOverlay, isCropperModal, isImageDisplay } =
    storeToRefs(useGeneral);
</script>

<template>
    <div>
        <NavMain />
        <slot />

        <CreatePostOverlay
            v-if="isPostOverlay"
        />

        <CropperModal
            v-if="isCropperModal"
        />

        <ImageDisplay v-if="isImageDisplay" />
    </div>
</template>
