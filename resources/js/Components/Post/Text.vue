<script setup lang="ts">
import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isImageDisplay } = storeToRefs(useGeneral);

const props = defineProps<{
    post: App.Data.PostData,
}>();
</script>

<template>
    <div class="px-5 pb-2 text-[1.0625rem] font-semibold">
        {{ post.text }}
    </div>
    <img
        v-if="post.image"
        loading="lazy"
        decoding="async"
        class="mx-auto h-80 w-full cursor-pointer object-cover"
        :src="post.image"
        @click="isImageDisplay = post.image"
    />
</template>
