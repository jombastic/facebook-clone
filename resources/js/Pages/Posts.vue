<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import { defineAsyncComponent } from "vue";
import type { PostData } from "@/types/generated";

// Lazy load components
const LeftSection = defineAsyncComponent(
    () => import("@/Components/Posts/LeftSection.vue"),
);
const RightSection = defineAsyncComponent(
    () => import("@/Components/Posts/RightSection.vue"),
);
const PostsSection = defineAsyncComponent(
    () => import("@/Components/Posts/PostsSection.vue"),
);

const props = defineProps<{ posts: PostData[] }>();
</script>

<template>
    <Head title="Posts" />
    <MainNavLayout>
        <div class="fixed h-full w-full bg-[#F1F2F5]">
            <div
                class="mx-auto mt-[3.5rem] grid h-[calc(100%-3.5rem)] w-full max-w-[100rem] grid-flow-col grid-rows-3 px-4"
            >
                <LeftSection />
                <PostsSection :posts="posts" />
                <RightSection />
            </div>
        </div>
    </MainNavLayout>
</template>
