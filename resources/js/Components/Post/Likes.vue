<script setup>
import ThumbUp from "vue-material-design-icons/ThumbUp.vue";

import CreateComment from "./CreateComment.vue";
import Comments from "./Comments.vue";

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

            <Comments :comments="comments" />
        </div>
    </div>
</template>
