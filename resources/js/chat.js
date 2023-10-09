import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";
import Pusher from "pusher-js";
window.Pusher = Pusher;

Pusher.logToConsole = true;
var pusher = new Pusher("ec1add393a7b068d96be", {
    cluster: "ap1",
    useTLS: true,
});
const notiChannel = pusher.subscribe("notification-channel");

//Post Comment
$(function () {
    // Attach a submit event handler to the form
    $(".commentForm").submit(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Store a reference to the form
        var form = $(this);

        // Get the values from the form inputs
        var postId = form.find('input[name="postId"]').val();
        var content = form.find('input[name="content"]').val();

        // Create a data object to send with the AJAX request
        var formData = {
            _token: $("input[name='_token']").val(),
            content: content,
            postId: postId,
        };

        // Send an AJAX POST request to your server to save the data
        $.ajax({
            type: "POST",
            url: "/comment", // Replace with the actual URL to save the data
            data: formData,
            success: function (response) {
                // Handle the success response here, if needed
                console.log("Data saved successfully");
                // Clear the content of the specific comment form
                form.find('input[name="content"]').val("");

                // Reload comments for the specific post
                loadComments(postId);
            },
            error: function (error) {
                // Handle any errors that occur during the AJAX request
                console.error("Error saving data:", error);
            },
        });
    });
});
// Bind to an event on the channel
notiChannel.bind("notification", function (data) {
    if (data.action == "comment") {
        Toastify({
            text: "Notification: "+data.sender.username+" commented on your post!",
            destination: "/p/" + data.post.id,
            newWindow: true,
            close: true,
            duration: 3000,
            gravity: "top",
            position: "right",
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
                color: "#fff",
                position: "fixed",
            },
            stopOnFocus: true,
        }).showToast();
    }
    else {
        Toastify({
            text: "Notification: " +data.sender.username+" liked your post!",
            destination: "/p/" + data.post.id,
            newWindow: true,
            close: true,
            duration: 20000,
            gravity: "top",
            position: "right",
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
                color: "#fff",
                position: "fixed",
            },
            stopOnFocus: true,
        }).showToast();
    }
});



//Connect to Pusher
const connectButton = document.querySelector(".connect-button");
// Get the channel name from the data attribute
connectButton.addEventListener("click", function () {
    const channelId = connectButton.getAttribute("data-conversation-id");
    // Subscribe to the Pusher channel
    const channel = pusher.subscribe(`channel-${channelId}`);
    // You can add event listeners to this channel to handle incoming messages or events
    channel.bind("pusher:subscription_succeeded", function (members) {
        // alert("successfully connected!");
        connectButton.textContent = "Connected";
    });
    channel.bind("message", (data) => {
        $.post("/chat/receive", {
            _token: $("input[name='_token']").val(),
            message: data.message,
        }).done(function (res) {
            $(".messages > .message").last().after(res);
            $(document).scrollTop($(document).height());
            console.log(res);
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
