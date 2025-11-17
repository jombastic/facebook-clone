<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import { defineAsyncComponent } from "vue";

import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import PostsSection from "@/Components/Posts/PostsSection.vue";
import { usePosts } from "@/composables";

// Lazy load components
const LeftSection = defineAsyncComponent(
    () => import("@/Components/Posts/LeftSection.vue"),
);
const RightSection = defineAsyncComponent(
    () => import("@/Components/Posts/RightSection.vue"),
);

const props = defineProps<{
    posts: App.Data.PostData[];
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
    <Head title="Posts" />
    <MainNavLayout>
        <div class="fixed h-full w-full bg-[#F1F2F5]">
            <div
                class="mx-auto mt-[3.5rem] grid h-[calc(100%-3.5rem)] w-full max-w-[100rem] grid-flow-col grid-rows-3 px-4"
            >
                <LeftSection />
                <PostsSection :posts="allPosts" />
                <RightSection />
            </div>
        </div>
    </MainNavLayout>
</template>
