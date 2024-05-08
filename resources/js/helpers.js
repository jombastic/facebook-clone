export const isImage = (file) => {
    if (file && /^image\/(jpeg|jpg|png)$/.test(file.type)) {
        return true;
    }

    return false;
};
