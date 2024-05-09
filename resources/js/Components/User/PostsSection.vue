<script setup>
import { usePage } from "@inertiajs/vue3";

import CreatePostBox from "@/Components/CreatePostBox.vue";
import Post from "@/Components/Posts/Post.vue";

defineProps({ posts: Object });
const loggedUser = usePage().props.auth.user;
</script>

<template>
    <div id="PostsSection" class="w-full overflow-auto md:w-7/12">
        <CreatePostBox
            v-if="loggedUser.id === user.id"
            :image="user.image"
            :placeholder="`What's on your mind ${user.name}`"
        />
        <div v-for="post in posts.data" :key="post">
            <Post :user="post.user" :post="post" :comments="post.comments" />
        </div>
    </div>
</template>
