<template>
        <div class="col-9">
            <div class="card">
                <div class="card-body" style="height: 85vh">
                    <div v-for="message in messages" :key="message.id">
                        <p>{{ message.user.name }}: {{ message.message }}</p>
                    </div>
                    <input
                        v-model="newMessage"
                        @keydown.enter="sendMessage"
                        placeholder="Type a message..."
                    />
                </div>
                <button @click="sendMessage">Send</button>
            </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            messages: [],
            newMessage: "",
        };
    },
    mounted() {
        // Listen for incoming messages on a channel (replace 'chat.{conversationId}' with your channel name).
        window.Echo.channel(`chat.${conversationId}`).listen(
            ".message",
            (message) => {
                this.messages.push(message);
            }
        );
    },
    methods: {
        sendMessage() {
            // Send the new message to the server (you will need an API endpoint).
            axios
                .post("/api/send-message", {
                    message: this.newMessage,
                    conversationId: conversationId,
                })
                .then((response) => {
                    // Clear the input field after sending the message.
                    this.newMessage = "";
                });
        },
    },
};
</script>
