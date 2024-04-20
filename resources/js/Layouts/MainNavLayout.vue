<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

import Magnify from "vue-material-design-icons/Magnify.vue";
import Home from "vue-material-design-icons/Home.vue";
import HomeOutline from "vue-material-design-icons/HomeOutline.vue";
import TelevisionPlay from "vue-material-design-icons/TelevisionPlay.vue";
import StorefrontOutline from "vue-material-design-icons/StorefrontOutline.vue";
import AccountGroup from "vue-material-design-icons/AccountGroup.vue";
import ControllerClassicOutline from "vue-material-design-icons/ControllerClassicOutline.vue";
import DotsGrid from "vue-material-design-icons/DotsGrid.vue";
import FacebookMessenger from "vue-material-design-icons/FacebookMessenger.vue";
import Bell from "vue-material-design-icons/Bell.vue";
import Logout from "vue-material-design-icons/Logout.vue";

import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
const useGeneral = useGeneralStore();
const { isPostOverlay, isCropperModal, isImageDisplay } =
    storeToRefs(useGeneral);

const user = usePage().props.auth.user;

let showMenu = ref(false);
</script>

<template>
    <div
        id="MainNav"
        class="fixed z-50 w-full flex items-center justify-between h-[3.5rem] bg-white shadow-xl border-b"
    >
        <div id="NavLeft" class="flex items-center justify-start w-[16.25rem]">
            <Link href="/" class="pl-3 min-w-[3.438rem]">
                <img
                    src="/images/icons/FacebookLogoCircle.png"
                    class="w-[2.5rem]"
                />
            </Link>
            <div
                class="flex items-center justify-center bg-[#EFF2F5] p-1 rounded-full h-[2.5rem] ml-2"
            >
                <Magnify class="p-1" :size="22" fillColor="#646788" />
                <input
                    type="text"
                    placeholder="Search Facebook"
                    class="lg:block hidden border-none p-0 bg-[#EFF2F5] placeholder-[#646768] ring-0 focus:ring-0"
                />
            </div>
        </div>

        <div
            id="NavCenter"
            class="hidden lg:flex items-center ml-5 justify-center w-8/12 max-w-[37.5rem]"
        >
            <Link href="/" class="w-full">
                <div
                    class="flex items-center justify-center h-[3rem] p-1 hover:bg-[#F2F2F2] w-full rounded-lg cursor-pointer"
                    :class="$page.url == '/' ? 'mt-1.5' : ''"
                >
                    <div>
                        <Home
                            v-if="$page.url === '/'"
                            class="mx-auto"
                            :size="27"
                            fillColor="#1A73E3"
                        />
                        <HomeOutline
                            v-else
                            class="mx-auto"
                            :size="32"
                            fillColor="#646768"
                        />
                    </div>
                </div>
                <div>
                    <div
                        v-if="$page.url === '/'"
                        class="border-b-4 border-b-blue-400 rounded-md"
                    ></div>
                </div>
            </Link>
            <button
                class="flex items-center justify-center h-[3rem] p-1 hover:bg-[#F2F2F2] w-full rounded-lg mx-1 cursor-pointer"
            >
                <TelevisionPlay
                    class="mx-auto"
                    :size="27"
                    fillColor="#646768"
                />
            </button>
            <button
                class="flex items-center justify-center h-[3rem] p-1 hover:bg-[#F2F2F2] w-full rounded-lg mx-1 cursor-pointer"
            >
                <StorefrontOutline
                    class="mx-auto"
                    :size="27"
                    fillColor="#646768"
                />
            </button>
            <button
                class="flex items-center justify-center h-[3rem] p-1 hover:bg-[#F2F2F2] w-full rounded-lg mx-1 cursor-pointer"
            >
                <span
                    class="rounded-full border-[0.125rem] border-[#646768] p-1"
                >
                    <AccountGroup
                        class="mx-auto"
                        :size="22"
                        fillColor="#646768"
                    />
                </span>
            </button>
            <button
                class="flex items-center justify-center h-[3rem] p-1 hover:bg-[#F2F2F2] w-full rounded-lg mx-1 cursor-pointer"
            >
                <ControllerClassicOutline
                    class="mx-auto"
                    :size="32"
                    fillColor="#646768"
                />
            </button>
        </div>
        <div class="flex items-center justify-end w-2/12 mr-4">
            <button
                class="rounded-full bg-[#E3E6EA] p-2 hover:bg-gray-300 mx-1 cursor-pointer"
            >
                <DotsGrid :size="23" fillColor="#050505" />
            </button>
            <button
                class="rounded-full bg-[#E3E6EA] p-2 hover:bg-gray-300 mx-1 cursor-pointer"
            >
                <FacebookMessenger :size="23" fillColor="#050505" />
            </button>
            <button
                class="rounded-full bg-[#E3E6EA] p-2 hover:bg-gray-300 mx-1 cursor-pointer"
            >
                <Bell :size="23" fillColor="#050505" />
            </button>
            <div class="flex items-center justify-center relative">
                <button @click="showMenu = !showMenu">
                    <img
                        src="https://picsum.photos/id/87/300/320"
                        class="rounded-full ml-1 min-w-[2.5rem] max-h-[2.5rem] cursor-pointer"
                        alt=""
                    />
                </button>
                <div
                    v-if="showMenu"
                    class="absolute bg-white shadow-xl top-10 right-0 w-[20.625rem] rounded-lg p-1 border mt-1"
                >
                    <Link href="/" @click="showMenu = !showMenu">
                        <div
                            class="flex items-center gap-3 hover:bg-gray-200 p-2 rounded-lg"
                        >
                            <img
                                src="https://picsum.photos/id/87/300/320"
                                class="rounded-full ml-1 min-w-[2.188rem] max-h-[2.188rem] cursor-pointer"
                                alt=""
                            />
                            <span>Slavcho Mitrov Dev</span>
                        </div>
                    </Link>
                    <Link
                        class="w-full"
                        :href="route('logout')"
                        as="button"
                        method="post"
                    >
                        <div
                            class="flex items-center gap-3 hover:bg-gray-200 px-2 py-2.5 rounded-lg"
                        >
                            <Logout class="pl-2" :size="30" />
                            <span>Logout</span>
                        </div>
                    </Link>
                    <div class="text-xs font-semibold p-2 pt-3 border-t mt-1">
                        Privacy · Terms · Advertising · Ad Choices · Cookies ·
                        More · Meta © {{ new Date().getFullYear() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <slot />
</template>
