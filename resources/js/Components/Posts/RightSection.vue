<script setup lang="ts">
import { usePage } from "@inertiajs/vue3";
import Magnify from "vue-material-design-icons/Magnify.vue";
import VideoImage from "vue-material-design-icons/VideoImage.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";

const searchIcons = [
    { component: VideoImage, size: 23, fillColor: "#050505" },
    { component: Magnify, size: 23, fillColor: "#050505" },
    { component: DotsHorizontal, size: 23, fillColor: "#050505" },
];

const friends: App.Data.FriendData[] = usePage().props.auth.user?.friends;
</script>

<template>
    <div id="RightSection" class="hidden pl-4 md:block">
        <div class="mx-auto min-w-[15.625rem] max-w-[21.25rem] pt-4">
            <div
                class="flex items-center justify-between border-b border-b-gray-300"
            >
                <div class="font-semibold">Contacts</div>
                <div class="flex items-center">
                    <template v-for="(icon, index) in searchIcons" :key="index">
                        <div
                            class="cursor-pointer rounded-full p-2 hover:bg-gray-300"
                        >
                            <component
                                :is="icon.component"
                                :size="icon.size"
                                :fillColor="icon.fillColor"
                            />
                        </div>
                    </template>
                </div>
            </div>
            <div class="h-[calc(100vh-7.1875rem)] overflow-auto pt-2">
                <template v-for="friend in friends" :key="friend.id">
                    <div
                        class="flex cursor-pointer items-center justify-start rounded-md py-2 hover:bg-[#E5E6E9]"
                    >
                        <img
                            loading="lazy"
                            decoding="async"
                            :src="`https://picsum.photos/id/${friend.picId}/300/320`"
                            class="ml-1 max-h-[2.375rem] min-w-[2.375rem] rounded-full"
                        />
                        <div
                            class="pl-3 text-[0.938rem] font-extrabold text-gray-800"
                        >
                            {{ friend.firstname }} {{ friend.lastname }}
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
