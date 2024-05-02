<script setup>
import UserMenu from "@/Components/Nav/UserMenu.vue";

import DotsGrid from "vue-material-design-icons/DotsGrid.vue";
import FacebookMessenger from "vue-material-design-icons/FacebookMessenger.vue";
import Bell from "vue-material-design-icons/Bell.vue";

const icons = [
    { component: DotsGrid, size: 23, fillColor: "#050505" },
    { component: FacebookMessenger, size: 23, fillColor: "#050505" },
    { component: Bell, size: 23, fillColor: "#050505" },
];
</script>

<template>
    <div class="flex items-center justify-end w-2/12 mr-4">
        <button
            v-for="icon in icons"
            :key="icon.component.name"
            class="rounded-full bg-[#E3E6EA] p-2 hover:bg-gray-300 mx-1 cursor-pointer"
        >
            <component
                :is="icon.component"
                :size="icon.size"
                :fillColor="icon.fillColor"
            />
        </button>

        <UserMenu />
    </div>
</template>
