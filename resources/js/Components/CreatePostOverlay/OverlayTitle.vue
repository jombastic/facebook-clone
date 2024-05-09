<script setup>
import Close from "vue-material-design-icons/Close.vue";
import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isPostOverlay } = storeToRefs(useGeneral);
</script>

<template>
    <div class="relative mx-1 my-3.5 flex items-center">
        <div class="w-full text-center text-[1.375rem] font-extrabold">
            Create Post
        </div>
        <div
            @click="isPostOverlay = false"
            class="absolute right-3 cursor-pointer rounded-full bg-gray-200 p-1.5 hover:bg-gray-300"
        >
            <Close :size="20" fillColor="#5E6771" />
        </div>
    </div>
</template>
