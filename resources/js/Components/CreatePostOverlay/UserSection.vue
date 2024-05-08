<script setup>
import { usePage } from "@inertiajs/vue3";

import ChevronDown from "vue-material-design-icons/ChevronDown.vue";
import Earth from "vue-material-design-icons/Earth.vue";

const user = usePage().props.auth.user;
</script>

<template>
    <div class="flex items-center">
        <img
            :src="user.image"
            class="ml-1 max-h-[2.8125rem] min-w-[2.8125rem] rounded-full"
        />
        <div class="ml-4">
            <div class="font-extrabold">
                {{ user.name }}
            </div>
            <div
                class="flex w-[6.25rem] items-center justify-between rounded-lg bg-gray-200 p-0.5 px-2"
            >
                <Earth :size="18" />
                <span class="pl-1.5 text-[.8125rem] font-bold">Public</span>
                <ChevronDown class="pl-1 pr-10" :size="18" />
            </div>
        </div>
    </div>
</template>
