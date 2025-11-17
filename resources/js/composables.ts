import { reactive, watch, type Ref } from "vue";

export function usePosts(
    initialPosts: App.Data.PostData[],
    latestPost?: Ref<App.Data.PostData | null | undefined> | (() => App.Data.PostData | null | undefined),
    deletedPostId?: Ref<number | undefined> | (() => number | undefined)
) {
    const allPosts = reactive([...initialPosts]);

    if (latestPost) {
        watch(
            latestPost,
            (newLatestPost) => {
                if (
                    newLatestPost &&
                    !allPosts.find((post) => post.id === newLatestPost.id)
                ) {
                    allPosts.unshift(newLatestPost);
                }
            },
        );
    }

    if (deletedPostId) {
        watch(
            deletedPostId,
            (newDeleteId) => {
                if (newDeleteId) {
                    const index = allPosts.findIndex((post) => post.id === newDeleteId);
                    if (index !== -1) {
                        allPosts.splice(index, 1);
                    }
                }
            },
        );
    }

    return { allPosts };
}
