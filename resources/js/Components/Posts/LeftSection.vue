<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";

import TelevisionPlay from "vue-material-design-icons/TelevisionPlay.vue";
import StorefrontOutline from "vue-material-design-icons/StorefrontOutline.vue";
import AccountGroup from "vue-material-design-icons/AccountGroup.vue";
import AccountMultiple from "vue-material-design-icons/AccountMultiple.vue";
import Flag from "vue-material-design-icons/Flag.vue";
import ClockTimeTwoOutline from "vue-material-design-icons/ClockTimeTwoOutline.vue";
import Restore from "vue-material-design-icons/Restore.vue";

const user = usePage().props.auth.user;

const sidebarItems = [
    { text: "Friends", icon: AccountMultiple, color: "#5BD7C6" },
    { text: "Pages", icon: Flag, color: "#F2682C" },
    { text: "Most Recent", icon: ClockTimeTwoOutline, color: "#21AAFA" },
    { text: "Groups", icon: AccountGroup, color: "#20A9FD" },
    { text: "Marketplace", icon: StorefrontOutline, color: "#48C0D8" },
    { text: "Watch", icon: TelevisionPlay, color: "#9739CF" },
    { text: "Memories", icon: Restore, color: "#32B4D0" },
];
</script>

<template>
    <div id="LeftSection" class="xl:w-[21.563rem] lg:block hidden">
        <div class="pt-4 max-w-[20rem] pr-4">
            <Link
                :href="route('user.show', { id: user.id })"
                class="flex items-center justify-start w-full cursor-pointer hover:bg-[#E5E6E9] p-2 rounded-md"
            >
                <img
                    class="rounded-full ml-1 min-w-[2.375rem] max-h-[2.375rem]"
                    :src="user.image"
                />
                <div class="text-[0.938rem] text-gray-800 font-extrabold pl-3">
                    {{ user.name }}
                </div>
            </Link>
            <template v-for="(item, index) in sidebarItems" :key="index">
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
</template>
