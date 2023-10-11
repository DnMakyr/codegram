import './bootstrap';
import './croppie';
import './realtimeFunctions';
import { createApp } from 'vue';
import Chat from './components/Chat.vue';
import ChatView from './components/ChatView.vue';
import Pusher from 'pusher-js';
const app = createApp({
    components: {
        Chat,
        ChatView,
    },
});

app.mount('#app');

app.component('chat', Chat);
app.component('chat-view', ChatView);



