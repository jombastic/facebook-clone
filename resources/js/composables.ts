import { reactive, watch, type Ref } from "vue";

export function usePosts(
    initialPosts: App.Data.PostData[],
    latestPost?:
        | Ref<App.Data.PostData | null | undefined>
        | (() => App.Data.PostData | null | undefined),
    deletedPostId?: Ref<number | undefined> | (() => number | undefined),
    newComment?:
        | Ref<App.Data.CommentData | null | undefined>
        | (() => App.Data.CommentData | null | undefined),
    deletedComment?:
        | Ref<App.Data.CommentData | null | undefined>
        | (() => App.Data.CommentData | null | undefined),
) {
    const allPosts = reactive([...initialPosts]);

    if (latestPost) {
        watch(latestPost, (newLatestPost) => {
            if (
                newLatestPost &&
                !allPosts.find((post) => post.id === newLatestPost.id)
            ) {
                allPosts.unshift(newLatestPost);
            }
        });
    }

    if (deletedPostId) {
        watch(deletedPostId, (newDeleteId) => {
            if (newDeleteId) {
                const index = allPosts.findIndex(
                    (post) => post.id === newDeleteId,
                );
                if (index !== -1) {
                    allPosts.splice(index, 1);
                }
            }
        });
    }

    if (newComment) {
        watch(newComment, (commentData) => {
            if (
                commentData
            ) {
                const index = allPosts.findIndex((post) => post.id === commentData.postId)

                if (index === -1) {
                    return;
                }

                allPosts[index].comments?.unshift(commentData);
            }
        });
    }

    if (deletedComment) {
        watch(deletedComment, (commentData) => {
            if (
                commentData
            ) {
                const index = allPosts.findIndex((post) => post.id === commentData.postId)

                if (index === -1 || !allPosts[index].comments?.length) {
                    return;
                }

                const commentIndex = allPosts[index].comments.findIndex((comment) => comment.id === commentData.id)

                if (commentIndex !== -1) {
                    allPosts[index].comments.splice(commentIndex, 1);
                }
            }
        });
    }

    return { allPosts };
}
