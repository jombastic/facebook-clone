<script setup>
import { router, usePage } from "@inertiajs/vue3";
import { toRefs } from "vue";

import Delete from "vue-material-design-icons/Delete.vue";
import AccountMultiple from "vue-material-design-icons/AccountMultiple.vue";

const props = defineProps({
    user: Object,
    post: Object,
});

const { post, user } = toRefs(props);

const loggedUser = usePage().props.auth.user;

const isUser = () => {
    router.get(route("user.show", { id: user.value.id }));
};

const deletePost = (id) => {
    router.delete(route("post.destroy", { id: id }), {
        preserveScroll: true,
    });
};
</script>

<template>
    <div class="flex items-center px-3 py-3">
        <button @click="isUser" class="mr-2">
            <img
                :src="user.image"
                class="ml-1 max-h-[2.625rem] min-w-[2.625rem] rounded-full"
            />
        </button>
        <div class="flex w-full items-center justify-between rounded-full p-2">
            <div>
                <div class="text-[0.9375rem] font-extrabold">
                    {{ user.name }}
                </div>
                <div class="flex items-center text-xs text-gray-600">
                    {{ post.created_at }}
                    <AccountMultiple
                        class="ml-1"
                        :size="15"
                        fillColor="#64676B"
                    />
                </div>
            </div>
            <div class="flex items-center">
                <button
                    v-if="loggedUser.id === post.user.id"
                    @click="deletePost(post.id)"
                    class="cursor-pointer rounded-full p-1.5 hover:bg-[#F2F2F2]"
                >
                    <Delete fillColor="#646768" />
                </button>
            </div>
        </div>
    </div>
</template>
