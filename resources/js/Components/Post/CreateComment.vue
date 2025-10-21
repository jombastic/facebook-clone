<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { reactive, toRefs } from "vue";

import Check from "vue-material-design-icons/Check.vue";

const loggedUser = usePage().props.auth.user;

const form = reactive({ comment: null });

const props = defineProps({
    user: Object,
    post: Object,
});

const { post } = toRefs(props);

const createComment = () => {
    router.post(
        route("comment.store"),
        {
            post_id: post.value.id,
            text: form.comment,
        },
        {
            preserveScroll: true,
            onSuccess: () => {
                // Reset the form after successful submission
                form.comment = null;
            },
        },
    );
};
</script>

<template>
    <div id="CreateComment" class="flex items-center justify-between py-2">
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
</template>
