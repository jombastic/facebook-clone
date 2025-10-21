<script setup>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

import Logout from "vue-material-design-icons/Logout.vue";

let showMenu = ref(false);

const user = usePage().props.auth.user;
</script>

<template>
    <div class="relative flex items-center justify-center">
        <button @click="showMenu = !showMenu">
            <img
                loading="lazy"
                decoding="async"
                :src="user.image"
                class="ml-1 max-h-[2.5rem] min-w-[2.5rem] cursor-pointer rounded-full"
            />
        </button>
        <div
            v-if="showMenu"
            class="absolute right-0 top-10 mt-1 w-[20.625rem] rounded-lg border bg-white p-1 shadow-xl"
        >
            <Link
                :href="route('user.show', { id: user.id })"
                @click="showMenu = !showMenu"
            >
                <div
                    class="flex items-center gap-3 rounded-lg p-2 hover:bg-gray-200"
                >
                    <img
                        loading="lazy"
                        decoding="async"
                        :src="user.image"
                        class="ml-1 max-h-[2.188rem] min-w-[2.188rem] cursor-pointer rounded-full"
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
                    class="flex items-center gap-3 rounded-lg px-2 py-2.5 hover:bg-gray-200"
                >
                    <Logout class="pl-2" :size="30" />
                    <span>Logout</span>
                </div>
            </Link>
            <div class="mt-1 border-t p-2 pt-3 text-xs font-semibold">
                Privacy · Terms · Advertising · Ad Choices · Cookies · More ·
                Meta © {{ new Date().getFullYear() }}
            </div>
        </div>
    </div>
</template>
