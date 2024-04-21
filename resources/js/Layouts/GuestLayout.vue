<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="h-screen flex flex-col items-center pt-[6.25rem] bg-gray-100">
        <div>
            <Link :href="route('login')">
                <img src="/images/icons/FacebookLogo.png" width="200">
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
