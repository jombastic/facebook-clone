import { defineStore } from "pinia";
import { isImage } from "@/helpers.js";

export const usePostStore = defineStore("post", {
    state: () => ({
        text: null,
        image: null,
        imageDisplay: null,
        error: null,
    }),
    actions: {
        getUploadedImage(e) {
            let imageFile = e.target.files[0];
            if (isImage(imageFile)) {
                this.imageDisplay = URL.createObjectURL(e.target.files[0]);
                this.image = imageFile;
            }
        },
        clearImage() {
            this.imageDisplay = null;
            this.image = null;
        },
    },
    // persist: true,
});
