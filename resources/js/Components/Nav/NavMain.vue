<script setup>
import NavLeft from "@/Components/Nav/NavLeft.vue";
import NavCenter from "@/Components/Nav/NavCenter.vue";
import NavRight from "@/Components/Nav/NavRight.vue";
</script>

<template>
    <div
        id="MainNav"
        class="fixed z-50 w-full flex items-center justify-between h-[3.5rem] bg-white shadow-xl border-b"
    >
        <NavLeft />

        <NavCenter />

        <NavRight />
    </div>
</template>
