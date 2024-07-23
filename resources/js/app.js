import './bootstrap';
import { createApp } from 'vue';
import FilePondUploader from './components/FilePondUploader.vue';
const app = createApp({
    components: {
        'file-pond-uploader': FilePondUploader,
    },
});

app.mount("#app");