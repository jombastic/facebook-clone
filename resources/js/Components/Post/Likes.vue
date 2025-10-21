<script setup>
import ThumbUp from "vue-material-design-icons/ThumbUp.vue";

import CreateComment from "./CreateComment.vue";
import Comments from "./Comments.vue";
import { WhenVisible } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
    post: Object,
    comments: Object,
});
</script>

<template>
    <div id="Likes" class="px-5">
        <div class="flex items-center justify-between border-b py-3">
            <ThumbUp fillColor="#1D72E2" :size="16" />
            <div class="tex-sm font-semibold text-gray-600">
                {{ comments.length }} comments
            </div>
        </div>

        <div id="Comments" class="px-3">
            <CreateComment :user="user" :post="post" />

            <WhenVisible data="comments" :params="{ post_id: post.id }">
                <template #fallback>
                    <div class="py-2 text-center">Loading comments...</div>
                </template>

                <Comments :comments="comments" />
            </WhenVisible>
        </div>
    </div>
</template>
