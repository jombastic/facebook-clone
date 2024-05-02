<script setup>
import { Link } from "@inertiajs/vue3";
import Magnify from "vue-material-design-icons/Magnify.vue";
</script>

<template>
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
</template>
