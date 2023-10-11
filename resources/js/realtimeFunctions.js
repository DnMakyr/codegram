import Toastify from "toastify-js";
import "toastify-js/src/toastify.css";
import Pusher from "pusher-js";
import { event } from "jquery";

//Post Comment
$(function () {
    $(".commentForm").on("submit", function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Store a reference to the form
        var form = $(this);

        // Get the values from the form inputs
        var postId = form.find('input[name="postId"]').val();
        var content = form.find('input[name="content"]').val();
        let userId = form.find('input[name="userId"]').val();

        // Create a data object to send with the AJAX request
        var formData = {
            _token: $("input[name='_token']").val(),
            content: content,
            postId: postId,
        };

        // Send an AJAX POST request to your server to save the data
        $.ajax({
            type: "POST",
            url: "/comment",
            data: formData,
            headers: {
                "X-Socket-Id": pusher.connection.socket_id,
            },
            success: function (response) {
                console.log("Data saved successfully");
                pusher.subscribe(`user.${userId}`);
                form.find('input[name="content"]').val("");
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
channel.bind("notification", function (data) {
    if (data.action == "comment") {
        Toastify({
            text:
                "" +
                data.sender.username +
                " commented on your post!",
            destination: "/p/" + data.post.id,
            newWindow: true,
            close: true,
            duration: 3000,
            gravity: "bottom",
            position: "right",
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
                color: "#fff",
                position: "fixed",
            },
            stopOnFocus: true,
        }).showToast();
    } else if (data.action == "like") {
        Toastify({
            text: "" + data.sender.username + " liked your post!",
            destination: "/p/" + data.post.id,
            newWindow: true,
            close: true,
            duration: 4000,
            gravity: "bottom",
            position: "right",
            style: {
                background: "linear-gradient(to right, #22c1c3, #fdbb2d)",
                color: "#fff",
                position: "fixed",
            },
            stopOnFocus: true,
        }).showToast();
        channel.subscribe(`user.${data.sender.id}`);
    }
    else {
        Toastify({
            text: "" + data.sender.username + " want to be your friend!",
            destination: "/profile/" + data.sender.id,
            newWindow: true,
            close: true,
            duration: 4000,
            gravity: "bottom",
            position: "right",
            style: {
                background: "linear-gradient(to right, #22c1c3, #fdbb2d)",
                color: "#fff",
                position: "fixed",
            },
            stopOnFocus: true,
        }).showToast();
        channel.subscribe(`user.${data.sender.id}`);
    }
});

//Like Post
$(function () {
    $(document).on("click", ".likeButton", function (e) {
        let postId = $(this).data("post-id");
        let userId = $(this).data("user-id");
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: `/like/${postId}`,
            data: {
                _token: $("input[name='_token']").val(),
            },
            headers: {
                "X-Socket-Id": pusher.connection.socket_id,
            },
            success: function (response) {
                pusher.subscribe(`user.${userId}`)
                reload(postId);
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            },
        });
    });
});
function reload(postId) {
    let buttonId = "#likeContainer-" + postId;
    let likeId = "#likeCount-" + postId;
    $(buttonId).load(location.href + " " + buttonId);
    $(likeId).load(location.href + " " + likeId);
}

//Realtime Chat

const connectButton = document.querySelector(".connect-button");

connectButton.addEventListener("click", function () {
    const channelId = connectButton.getAttribute("data-conversation-id");
    const channel = pusher.subscribe(`channel-${channelId}`);

    channel.bind("pusher:subscription_succeeded", function (members) {
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
        });
    });
});

//Disconnect from Pusher
const returnButton = document.querySelector(".return-button");
returnButton.addEventListener("click", function () {
    const channelId = returnButton.getAttribute("data-conversation-id");
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

//reload notification
function loadNotifications() {
    event.preventDefault();
    $.ajax({
        type: "GET",
        url: `/`,
        data: {
            _token: $("input[name='_token']").val(),
        },
        success: function (response) {
            let containerId = "#notificationSidebar";
            $(containerId).load(location.href + " " + containerId);
            let countSpan = ".notification-count";
            $(countSpan).load(location.href + " " + countSpan);
        },
        error: function (error) {
            console.error(error.responseJSON.message);
        },
    });
}
