<script setup>
import { Head } from "@inertiajs/vue3";
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import LeftSection from "@/Components/Posts/LeftSection.vue";
import RightSection from "@/Components/Posts/RightSection.vue";
import PostsSection from "@/Components/Posts/PostsSection.vue";

defineProps({ posts: Object });
</script>

<template>
    <Head title="Posts" />

    <MainNavLayout>
        <div class="fixed w-full h-full bg-[#F1F2F5]">
            <div
                class="grid grid-rows-3 grid-flow-col w-full max-w-[100rem] mt-[3.5rem] h-[calc(100%-3.5rem)] mx-auto px-4"
            >
                <LeftSection />
                <PostsSection :posts="posts" />

                <RightSection />
            </div>
        </div>
    </MainNavLayout>
</template>
