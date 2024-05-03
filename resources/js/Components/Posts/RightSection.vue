<script setup>
import { usePage } from "@inertiajs/vue3";
import Magnify from "vue-material-design-icons/Magnify.vue";
import VideoImage from "vue-material-design-icons/VideoImage.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";

const searchIcons = [
    { component: VideoImage, size: 23, fillColor: "#050505" },
    { component: Magnify, size: 23, fillColor: "#050505" },
    { component: DotsHorizontal, size: 23, fillColor: "#050505" },
];

const friends = usePage().props.auth.user?.friends;
</script>

<template>
    <div id="RightSection" class="pl-4 md:block hidden">
        <div class="max-w-[21.25rem] min-w-[15.625rem] mx-auto pt-4">
            <div
                class="flex items-center justify-between border-b border-b-gray-300"
            >
                <div class="font-semibold">Contacts</div>
                <div class="flex items-center">
                    <template v-for="(icon, index) in searchIcons" :key="index">
                        <div
                            class="p-2 hover:bg-gray-300 rounded-full cursor-pointer"
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
                        class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md"
                    >
                        <img
                            :src="`https://picsum.photos/id/${friend.picId}/300/320`"
                            class="rounded-full ml-1 min-w-[2.375rem] max-h-[2.375rem]"
                        />
                        <div
                            class="text-[0.938rem] text-gray-800 font-extrabold pl-3"
                        >
                            {{ friend.firstname }} {{friend.lastname}}
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
