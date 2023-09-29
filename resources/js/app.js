import './bootstrap';
import './croppie';
import { createApp } from 'vue';
import Chat from './components/Chat.vue';
const app = createApp({
    components: {
        Chat,
    },
});

app.mount('#app');

app.component('chat', Chat);


