<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

import DotsGrid from "vue-material-design-icons/DotsGrid.vue";
import FacebookMessenger from "vue-material-design-icons/FacebookMessenger.vue";
import Bell from "vue-material-design-icons/Bell.vue";
import Logout from "vue-material-design-icons/Logout.vue";

import CropperModal from "@/Components/CropperModal.vue";
import NavLeft from "@/Components/Nav/NavLeft.vue";
import NavCenter from "@/Components/Nav/NavCenter.vue";
import ImageDisplay from "@/Components/ImageDisplay.vue";
import CreatePostOverlay from "@/Components/CreatePostOverlay.vue";

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
        <NavLeft />

        <NavCenter />
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
                        :src="user.image"
                        class="rounded-full ml-1 min-w-[2.5rem] max-h-[2.5rem] cursor-pointer"
                    />
                </button>
                <div
                    v-if="showMenu"
                    class="absolute bg-white shadow-xl top-10 right-0 w-[20.625rem] rounded-lg p-1 border mt-1"
                >
                    <Link
                        :href="route('user.show', { id: user.id })"
                        @click="showMenu = !showMenu"
                    >
                        <div
                            class="flex items-center gap-3 hover:bg-gray-200 p-2 rounded-lg"
                        >
                            <img
                                :src="user.image"
                                class="rounded-full ml-1 min-w-[2.188rem] max-h-[2.188rem] cursor-pointer"
                            />
                            <span>{{ user.name }}</span>
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

    <CreatePostOverlay
        v-if="isPostOverlay"
        @showModal="isPostOverlay = false"
    />

    <CropperModal v-if="isCropperModal" @showModal="isCropperModal = false" />

    <ImageDisplay v-if="isImageDisplay" />
</template>
