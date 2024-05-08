import { defineStore } from "pinia";

export const usePostStore = defineStore("post", {
    state: () => ({
        text: null,
        image: null,
        imageDisplay: null,
        error: null,
    }),
    actions: {
        getUploadedImage(e) {
            this.imageDisplay = URL.createObjectURL(e.target.files[0]);
            this.image = e.target.files[0];
        },
        clearImage() {
            this.imageDisplay = null;
            this.image = null;
        },
    },
    // persist: true,
});
