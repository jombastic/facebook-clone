<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import { defineAsyncComponent, toRef } from "vue";
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import PostsSection from "@/Components/User/PostsSection.vue";
import { usePosts } from "@/composables";

const TopSection = defineAsyncComponent(
    () => import("@/Components/User/TopSection.vue"),
);
const LeftSection = defineAsyncComponent(
    () => import("@/Components/User/LeftSection.vue"),
);

const props = defineProps<{
    posts: App.Data.PostData[];
    user: App.Data.UserData;
    latestPost?: App.Data.PostData | null;
    deletedPostId?: number;
}>();

const { allPosts } = usePosts(
    props.posts,
    () => props.latestPost,
    () => props.deletedPostId
);
</script>

<template>
    <Head title="User" />

    <MainNavLayout>
        <div class="min-h-screen w-full bg-gray-100 pb-20">
            <TopSection :user="user" />
            <div
                class="mx-auto h-[calc(100%-56px)] w-full max-w-[1100px] justify-between px-2 md:flex md:px-0"
            >
                <LeftSection :posts="allPosts" />
                <PostsSection :user="user" :posts="allPosts" />
            </div>
        </div>
    </MainNavLayout>
</template>
