import './bootstrap';
import './croppie';
import './chat.js';
import { createApp } from 'vue';
import Chat from './components/Chat.vue';
import ChatView from './components/ChatView.vue';
const app = createApp({
    components: {
        Chat,
        ChatView,
    },
});

app.mount('#app');

app.component('chat', Chat);
app.component('chat-view', ChatView);



