<script setup>
import Delete from "vue-material-design-icons/Delete.vue";

import { Link, router, usePage } from "@inertiajs/vue3";

defineProps({
    comments: Object,
});

const loggedUser = usePage().props.auth.user;

const deleteComment = (id) => {
    router.delete(route("comment.destroy", { id: id }), {
        preserveScroll: true,
    });
};
</script>

<template>
    <div
        v-if="comments"
        id="Comments"
        class="max-h-[7.5rem] overflow-auto px-4 pb-2"
    >
        <div
            v-for="comment in comments"
            :key="comment"
            class="flex items-center justify-between pb-2"
        >
            <div class="mb-1 flex w-full items-center">
                <Link
                    :href="route('user.show', { id: comment.user.id })"
                    class="mr-2"
                >
                    <img
                        :src="comment.user.image"
                        class="ml-1 max-h-[2.25rem] min-w-[2.25rem] rounded-full"
                    />
                </Link>
                <div class="flex w-full items-center">
                    <div
                        class="flex w-full items-center rounded-lg bg-[#EFF2F5] p-2 text-xs"
                    >
                        {{ comment.text }}
                    </div>
                    <button
                        v-if="loggedUser.id === comment.user.id"
                        @click="deleteComment(comment.id)"
                        class="ml-2 cursor-pointer rounded-full p-1.5 hover:bg-[#F2F2F2]"
                    >
                        <Delete fillColor="#646768" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
