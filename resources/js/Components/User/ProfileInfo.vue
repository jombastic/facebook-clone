<script setup lang="ts">
import { Link, usePage } from "@inertiajs/vue3";
import { useGeneralStore } from "@/stores/general";
import { storeToRefs } from "pinia";
import Camera from "vue-material-design-icons/Camera.vue";
import Pen from "vue-material-design-icons/Pen.vue";

const useGeneral = useGeneralStore();
const { isCropperModal } = storeToRefs(useGeneral);

defineProps<{ user: App.Data.UserData }>();
const loggedUser = usePage().props.auth.user;
</script>

<template>
    <div
        id="ProfileInfo"
        class="flex flex-col items-center justify-between px-4 md:flex-row"
    >
        <div
            class="-mt-16 flex flex-col items-center gap-4 md:-mt-6 md:flex-row"
        >
            <div class="relative">
                <img
                    class="w-[165px] rounded-full border-4 border-white"
                    :src="user.image"
                />
                <button
                    v-if="loggedUser.id === user.id"
                    @click="isCropperModal = true"
                    class="absolute right-0 top-[100px] cursor-pointer rounded-full bg-gray-200 p-1.5 hover:bg-gray-300"
                >
                    <Camera :size="25" />
                </button>
            </div>
            <div class="-mt-3 text-center md:mt-4 md:text-left">
                <div class="pt-1 text-[20px] font-extrabold">
                    {{ user.name }}
                </div>
                <div
                    class="mb-1.5 text-center text-[17px] font-bold text-gray-600 md:text-left"
                >
                    {{ loggedUser.friends.length }} friends
                </div>
                <div class="flex justify-center md:-ml-1 md:justify-start">
                    <template
                        v-for="(friend, index) in loggedUser.friends.slice(
                            0,
                            10,
                        )"
                        :key="friend.id"
                    >
                        <img
                            :src="`https://picsum.photos/id/${friend.id}/300/200`"
                            class="h-[40px] w-[40px] rounded-full border-2 border-white"
                            :class="{
                                'z-[10] -ml-1': index === 0,
                                '-ml-3': index > 0,
                                ['z-' + (10 - index)]: index > 0,
                            }"
                        />
                    </template>
                </div>
            </div>
        </div>
        <Link
            v-if="loggedUser.id === user.id"
            :href="route('profile.edit')"
            class="my-4 flex w-7/12 cursor-pointer items-baseline justify-center rounded-lg bg-gray-200 hover:bg-gray-300 md:my-0 md:w-[10rem]"
        >
            <button class="flex items-center px-5 py-2 font-bold">
                <Pen class="-ml-2 mr-1" :size="22" /> Edit Profile
            </button>
        </Link>
    </div>
</template>
