<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

import Logout from "vue-material-design-icons/Logout.vue";

let showMenu = ref(false);

const user = usePage().props.auth.user;
</script>

<template>
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
                Privacy · Terms · Advertising · Ad Choices · Cookies · More ·
                Meta © {{ new Date().getFullYear() }}
            </div>
        </div>
    </div>
</template>
