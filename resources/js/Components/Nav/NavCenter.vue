<script setup>
import { Link } from "@inertiajs/vue3";

import Home from "vue-material-design-icons/Home.vue";
import HomeOutline from "vue-material-design-icons/HomeOutline.vue";
import TelevisionPlay from "vue-material-design-icons/TelevisionPlay.vue";
import StorefrontOutline from "vue-material-design-icons/StorefrontOutline.vue";
import AccountGroup from "vue-material-design-icons/AccountGroup.vue";
import ControllerClassicOutline from "vue-material-design-icons/ControllerClassicOutline.vue";

const icons = [
    {
        name: 'TelevisionPlay',
        component: TelevisionPlay,
        size: 27
    },
    {
        name: 'StorefrontOutline',
        component: StorefrontOutline,
        size: 27
    },
    {
        name: 'AccountGroup',
        component: AccountGroup,
        size: 22
    },
    {
        name: 'ControllerClassicOutline',
        component: ControllerClassicOutline,
        size: 32
    }
]
</script>

<template>
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
        <template v-for="icon in icons" :key="icon.name">
            <button
                class="flex items-center justify-center h-[3rem] p-1 hover:bg-[#F2F2F2] w-full rounded-lg mx-1 cursor-pointer"
            >
                <component
                    :is="icon.component"
                    class="mx-auto"
                    :class="{ 'rounded-full border-[0.125rem] border-[#646768] p-1': icon.name === 'AccountGroup' }"
                    :size="icon.size"
                    fillColor="#646768"
                />
            </button>
        </template>
    </div>


</template>
