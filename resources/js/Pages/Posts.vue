<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";
import MainNavLayout from "@/Layouts/MainNavLayout.vue";
import CreatePostBox from "@/Components/CreatePostBox.vue";
import Post from "@/Components/Post.vue";

import Magnify from "vue-material-design-icons/Magnify.vue";
import TelevisionPlay from "vue-material-design-icons/TelevisionPlay.vue";
import StorefrontOutline from "vue-material-design-icons/StorefrontOutline.vue";
import AccountGroup from "vue-material-design-icons/AccountGroup.vue";
import AccountMultiple from "vue-material-design-icons/AccountMultiple.vue";
import Flag from "vue-material-design-icons/Flag.vue";
import ClockTimeTwoOutline from "vue-material-design-icons/ClockTimeTwoOutline.vue";
import Restore from "vue-material-design-icons/Restore.vue";
import VideoImage from "vue-material-design-icons/VideoImage.vue";
import DotsHorizontal from "vue-material-design-icons/DotsHorizontal.vue";

const sidebarItems = [
    { text: "Friends", icon: AccountMultiple, color: "#5BD7C6" },
    { text: "Pages", icon: Flag, color: "#F2682C" },
    { text: "Most Recent", icon: ClockTimeTwoOutline, color: "#21AAFA" },
    { text: "Groups", icon: AccountGroup, color: "#20A9FD" },
    { text: "Marketplace", icon: StorefrontOutline, color: "#48C0D8" },
    { text: "Watch", icon: TelevisionPlay, color: "#9739CF" },
    { text: "Memories", icon: Restore, color: "#32B4D0" },
];

const searchIcons = [
    { component: VideoImage, size: 23, fillColor: "#050505" },
    { component: Magnify, size: 23, fillColor: "#050505" },
    { component: DotsHorizontal, size: 23, fillColor: "#050505" },
];

const names = [
    { id: 1, name: "Kiril Spasov", picId: 140 },
    { id: 2, name: "Alexa Richardson", picId: 241 },
    { id: 3, name: "Jordan Smith", picId: 342 },
    { id: 4, name: "Samantha Bee", picId: 443 },
    { id: 5, name: "Michael Reeves", picId: 144 },
    { id: 6, name: "Lily Collins", picId: 244 },
    { id: 7, name: "Chris Evans", picId: 343 },
    { id: 8, name: "Emma Watson", picId: 447 },
    { id: 9, name: "Robert Downey", picId: 149 },
    { id: 10, name: "Scarlett Johansson", picId: 249 },
    { id: 11, name: "Tom Holland", picId: 350 },
    { id: 12, name: "Zendaya Coleman", picId: 451 },
    { id: 13, name: "Benedict Cumberbatch", picId: 152 },
    { id: 14, name: "Chris Hemsworth", picId: 253 },
    { id: 15, name: "Mark Ruffalo", picId: 354 },
    { id: 16, name: "Elizabeth Olsen", picId: 455 },
];

defineProps({ posts: Object });
const user = usePage().props.auth.user;
</script>

<template>
    <Head title="Posts" />

    <MainNavLayout>
        <div class="fixed w-full h-full bg-[#F1F2F5]">
            <div
                class="grid grid-rows-3 grid-flow-col w-full max-w-[100rem] mt-[3.5rem] h-[calc(100%-3.5rem)] mx-auto px-4"
            >
                <div id="LeftSection" class="xl:w-[21.563rem] lg:block hidden">
                    <div class="pt-4 max-w-[20rem] pr-4">
                        <Link
                            href="/"
                            class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] p-2 rounded-md"
                        >
                            <img
                                class="rounded-full ml-1 min-w-[2.375rem] max-h-[2.375rem]"
                                src="https://picsum.photos/id/87/300/320"
                            />
                            <div
                                class="text-[0.938rem] text-gray-800 font-extrabold pl-3"
                            >
                                Slavcho Mitrov Dev
                            </div>
                        </Link>
                        <template
                            v-for="(item, index) in sidebarItems"
                            :key="index"
                        >
                            <button
                                class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] px-2 py-1.5 rounded-md"
                            >
                                <component
                                    :is="item.icon"
                                    :size="40"
                                    :fillColor="item.color"
                                />
                                <div
                                    class="text-[0.938rem] text-gray-800 font-extrabold pl-3"
                                >
                                    {{ item.text }}
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
                <div
                    id="PostsSection"
                    class="row-span-6 max-w-[37.5rem] lg:mx-0 mx-auto overflow-auto"
                >
                    <CreatePostBox
                        image="https://picsum.photos/id/87/300/320"
                        placeholder="What's on your mind Slavcho Mitrov Dev"
                    />
                    <div v-for="post in posts.data" :key="post">
                        <Post
                            :user="post.user"
                            :post="post"
                            :comments="post.comments"
                        />
                    </div>
                </div>

                <div id="RightSection" class="pl-4 md:block hidden">
                    <div
                        class="max-w-[21.25rem] min-w-[15.625rem] mx-auto pt-4"
                    >
                        <div
                            class="flex items-center justify-between border-b border-b-gray-300"
                        >
                            <div class="font-semibold">Contacts</div>
                            <div class="flex items-center">
                                <template
                                    v-for="(icon, index) in searchIcons"
                                    :key="index"
                                >
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
                        <div
                            class="h-[calc(100vh-7.1875rem)] overflow-auto pt-2"
                        >
                            <template v-for="person in names" :key="person.id">
                                <div
                                    class="flex items-center justify-start cursor-pointer hover:bg-[#E5E6E9] py-2 rounded-md"
                                >
                                    <img
                                        :src="`https://picsum.photos/id/${person.picId}/300/320`"
                                        class="rounded-full ml-1 min-w-[2.375rem] max-h-[2.375rem]"
                                    />
                                    <div
                                        class="text-[0.938rem] text-gray-800 font-extrabold pl-3"
                                    >
                                        {{ person.name }}
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainNavLayout>
</template>
