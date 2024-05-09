<script setup>
import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isImageDisplay } = storeToRefs(useGeneral);

const props = defineProps({
    post: Object,
});
</script>

<template>
    <div class="px-5 pb-2 text-[1.0625rem] font-semibold">
        {{ post.text }}
    </div>
    <img
        @click="isImageDisplay = post.image"
        class="mx-auto cursor-pointer"
        :src="post.image"
    />
</template>
