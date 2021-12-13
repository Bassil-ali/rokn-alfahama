import store from '../../store';
export default class UploadAdapter {
    constructor(loader) {
        // CKEditor 5's FileLoader instance.
        this.loader = loader;

        // URL where to send files.
        // this.url = 'https://example.com/image/upload/path';
    }

    // Starts the upload process.
    async upload() {
        return new Promise((resolve, reject) => {

            try {
                let file = this.loader.file.then((file) => {
                    store.dispatch("media/store", {
                        file,
                        is_file: true,
                        gallery_id: 1
                    }).then((image) => {
                        resolve({
                            default:image.url
                        });
                    });
                });
            } catch (err) {
                reject(err);
            }
        });
    }

    // Aborts the upload process.
    abort() {}

    // Example implementation using XMLHttpRequest.


}