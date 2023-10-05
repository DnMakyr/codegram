// import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;
var pusher = new Pusher("ec1add393a7b068d96be", {
    cluster: "ap1",
});
Pusher.logToConsole = true;
//Connect to Pusher
const connectButton = document.querySelector(".connect-button");
// Get the channel name from the data attribute
connectButton.addEventListener("click", function () {
    const channelId = connectButton.getAttribute("data-conversation-id");
    // Subscribe to the Pusher channel
    const channel = pusher.subscribe(`channel-${channelId}`);
    // You can add event listeners to this channel to handle incoming messages or events
    channel.bind("pusher:subscription_succeeded", function (embers) {
        // alert("successfully connected!");
        connectButton.textContent = "Connected";
    });
    channel.bind('message', (data) => {
        $.post("/chat/receive", {
            _token: $("input[name='_token']").val(),
            message: data.message,
        }).done(function (res) {
            $(".messages > .message").last().after(res);
            $(document).scrollTop($(document).height());
            console.log (res);
            // alert("successfully received!\n" + data.message);
        });
    });
});

//Disconnect from Pusher
const returnButton = document.querySelector(".return-button");
returnButton.addEventListener("click", function () {
    const channelId = returnButton.getAttribute("data-conversation-id");
    // Unsubscribe to the Pusher channel
    pusher.unsubscribe(`channel-${channelId}`);
    window.location.href = "/chat";
});

$("#chatForm").on("submit", function (e) {
    e.preventDefault();
    let form = $(this);
    let message = form.find('input[name="message"]').val();
    let conversation_id = form.find('input[name="conversation_id"]').val();
    let formData = {
        _token: $("input[name='_token']").val(),
        message: message,
        conversation_id: conversation_id,
    };
    $.ajax({
        type: "POST",
        url: `/chat/send`,
        headers: {
            "X-Socket-Id": pusher.connection.socket_id,
        },
        data: formData,
        success: function (res) {
            form.find('input[name="message"]').val("");
            $(".messages > .message").last().after(res);
            $(document).scrollTop($(document).height());
        },
        error: function (error) {
            console.error("Error saving data:", error);
        },
    });
}); 
