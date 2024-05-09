<script setup>
import UserDelete from "./UserDelete.vue";
import Text from "./Text.vue";
import Likes from "./Likes.vue";

const props = defineProps({
    user: Object,
    post: Object,
    comments: Object,
});
</script>

<template>
    <div id="Post" class="my-4 w-full rounded-lg bg-white shadow-md">
        <UserDelete :user="user" :post="post" />

        <Text :post="post" />

        <Likes :user="user" :post="post" :comments="comments" />
    </div>
</template>
