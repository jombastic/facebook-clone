<script setup>
import AddToPost from "./CreatePostOverlay/AddToPost.vue";
import UserSection from "./CreatePostOverlay/UserSection.vue";
import TextForm from "./CreatePostOverlay/TextForm.vue";
import OverlayTitle from "./CreatePostOverlay/OverlayTitle.vue";
import CreatePost from "./CreatePostOverlay/CreatePost.vue";
</script>

<template>
    <div
        id="CreatePostsOverlay"
        class="fixed left-0 top-0 z-50 h-full w-full bg-white bg-opacity-70"
    >
        <div class="grid h-screen place-items-center p-4">
            <div
                class="mx-auto w-full max-w-[37.5rem] rounded-xl bg-white shadow-xl"
            >
                <OverlayTitle />
                <div class="border-t border-t-gray-300">
                    <div class="p-4">
                        <UserSection />

                        <TextForm />

                        <AddToPost />

                        <CreatePost />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
