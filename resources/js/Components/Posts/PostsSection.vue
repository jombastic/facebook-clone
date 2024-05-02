<script setup>
import { usePage } from "@inertiajs/vue3";
import Post from "../Post.vue";
import CreatePostBox from "../CreatePostBox.vue";

defineProps({ posts: Object });
const user = usePage().props.auth.user;
</script>

<template>
    <div
        id="PostsSection"
        class="row-span-6 max-w-[37.5rem] lg:mx-0 mx-auto overflow-auto"
    >
        <CreatePostBox
            :image="user.image"
            :placeholder="`What's on your mind ${user.name}`"
        />
        <div v-for="post in posts.data" :key="post">
            <Post :user="post.user" :post="post" :comments="post.comments" />
        </div>
    </div>
</template>
