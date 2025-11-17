<script setup lang="ts">
import ProfileInfo from "./ProfileInfo.vue";

defineProps<{ user: App.Data.UserData }>();
const tabs = ["Posts", "About", "Friends", "Videos", "Photos", "Check-ins"];
</script>

<template>
    <div class="w-full bg-white">
        <div class="mx-auto max-w-[68.75rem] pb-1 pt-[3.5rem]">
            <img
                loading="lazy"
                decoding="async"
                src="https://picsum.photos/id/45/2000/320"
                class="h-[11rem] w-full rounded-b-xl object-cover"
            />
            <ProfileInfo :user="user" />
            <div class="flex h-[3.125rem] border-t py-[.25rem]">
                <template v-for="tab in tabs" :key="tab">
                    <button
                        class="relative mx-1 flex h-[3rem] w-[5.3125rem] cursor-pointer items-center justify-center rounded-lg p-1 text-[.9375rem] font-bold hover:bg-[#F2F2F2]"
                        :class="{
                            'text-blue-500 after:absolute after:bottom-0 after:w-full after:rounded-md after:border-b-4 after:border-b-blue-400 after:content-[\'\']':
                                tab === 'Posts',
                        }"
                    >
                        {{ tab }}
                    </button>
                </template>
            </div>
        </div>
    </div>
</template>
