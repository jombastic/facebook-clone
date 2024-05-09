<script setup>
import { toRefs, reactive } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3";

import UserDelete from "./Post/UserDelete.vue";
import Text from "./Post/Text.vue";

import ThumbUp from "vue-material-design-icons/ThumbUp.vue";
import Check from "vue-material-design-icons/Check.vue";
import Delete from "vue-material-design-icons/Delete.vue";

const form = reactive({ comment: null });

const loggedUser = usePage().props.auth.user;

const props = defineProps({
    user: Object,
    post: Object,
    comments: Object,
});

const { post, comments } = toRefs(props);

const createComment = () => {
    router.post(
        route("comment.store"),
        {
            post_id: post.value.id,
            text: form.comment,
        },
        {
            preserveScroll: true,
        },
    );
};

const deleteComment = (id) => {
    router.delete(route("comment.destroy", { id: id }), {
        preserveScroll: true,
    });
};
</script>

<template>
    <div id="Post" class="my-4 w-full rounded-lg bg-white shadow-md">
        <UserDelete :user="user" :post="post" />

        <Text :post="post" />

        <div id="Likes" class="px-5">
            <div class="flex items-center justify-between border-b py-3">
                <ThumbUp fillColor="#1D72E2" :size="16" />
                <div class="tex-sm font-semibold text-gray-600">
                    {{ comments.length }} comments
                </div>
            </div>

            <div id="Comments" class="px-3">
                <div
                    id="CreateComment"
                    class="flex items-center justify-between py-2"
                >
                    <div class="flex w-full items-center">
                        <Link
                            :href="route('user.show', { id: loggedUser.id })"
                            class="mr-2"
                        >
                            <img
                                :src="loggedUser.image"
                                class="ml-1 max-h-[2.25rem] min-w-[2.25rem] rounded-full"
                            />
                        </Link>
                        <div
                            class="flex w-full items-center justify-center rounded-full bg-[#EFF2F5] p-2"
                        >
                            <input
                                v-model="form.comment"
                                type="text"
                                class="mx-1 w-full border-none bg-[#EFF2F5] p-0 text-sm placeholder-[#646768] ring-0 focus:ring-0"
                                placeholder="Write a public comment..."
                            />
                            <button
                                type="button"
                                @click="createComment"
                                class="flex items-center rounded-full bg-blue-500 pl-2 pr-3.5 text-sm font-bold text-white hover:bg-blue-600"
                            >
                                <Check fillColor="#FFFFFF" :size="20" />Send
                            </button>
                        </div>
                    </div>
                </div>
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
                                :href="
                                    route('user.show', { id: comment.user.id })
                                "
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
            </div>
        </div>
    </div>
</template>
