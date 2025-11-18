<script setup lang="ts">
import Delete from "vue-material-design-icons/Delete.vue";

import { Link, router, usePage } from "@inertiajs/vue3";

defineProps<{
    comments?: App.Data.CommentData[],
}>();

const loggedUser = usePage().props.auth.user;

const deleteComment = (id: number) => {
    router.delete(route("comment.destroy", { id: id }), {
        only: ['deletedComment'],
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
            :key="comment.id"
            class="flex items-center justify-between pb-2"
        >
            <div class="mb-1 flex w-full items-center">
                <Link
                    :href="route('user.show', { id: comment.user?.id })"
                    class="mr-2"
                >
                    <img
                        :src="comment.user?.image"
                        class="ml-1 max-h-[2.25rem] min-w-[2.25rem] rounded-full"
                    />
                </Link>
                <div class="flex w-full items-center">
                    <div
                        class="w-full rounded-lg bg-[#EFF2F5] p-2"
                    >
                        <div class="text-[0.9375rem] text-xs/4 font-extrabold">
                            {{ comment.user?.name }}
                        </div>
                        <div class="text-sm">{{ comment.text }}</div>
                    </div>
                    <button
                        v-if="loggedUser.id === comment.user?.id"
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
