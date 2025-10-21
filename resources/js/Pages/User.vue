<script setup>
import { Head } from "@inertiajs/vue3";
import { defineAsyncComponent } from "vue";
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import PostsSection from "@/Components/Posts/PostsSection.vue";

const TopSection = defineAsyncComponent(
    () => import("@/Components/User/TopSection.vue"),
);
const LeftSection = defineAsyncComponent(
    () => import("@/Components/User/LeftSection.vue"),
);

defineProps({ posts: Object, user: Object });
</script>

<template>
    <Head title="User" />

    <MainNavLayout>
        <div class="min-h-screen w-full bg-gray-100 pb-20">
            <TopSection :user="user" />
            <div
                class="mx-auto h-[calc(100%-56px)] w-full max-w-[1100px] justify-between px-2 md:flex md:px-0"
            >
                <LeftSection :posts="posts" />
                <PostsSection :posts="posts" />
            </div>
        </div>
    </MainNavLayout>
</template>
