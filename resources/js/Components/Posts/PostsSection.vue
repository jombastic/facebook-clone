<script setup>
import { usePage } from "@inertiajs/vue3";
import Post from "@/Components/Post/Post.vue";

import { defineAsyncComponent } from "vue";

const CreatePostBox = defineAsyncComponent(
    () => import("@/Components/CreatePostBox.vue"),
);

defineProps({ posts: Object });
const user = usePage().props.auth.user;
</script>

<template>
    <div
        id="PostsSection"
        class="row-span-6 mx-auto max-w-[37.5rem] overflow-auto lg:mx-0"
    >
        <CreatePostBox
            :image="user.image"
            :placeholder="`What's on your mind ${user.name}`"
        />
        <div v-for="post in posts" :key="post">
            <Post :user="post.user" :post="post" :comments="post.comments" />
        </div>
    </div>
</template>
