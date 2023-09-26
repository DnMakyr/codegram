$(document).ready(function () {
    $("#chatForm").submit(function (e) {
        e.preventDefault();
        var form = $(this);
        var message = form.find('input[name="message"]').val();
        var conversation_id = form.find('input[name="conversation_id"]').val();
        var formData = {
            _token: $("input[name='_token']").val(),
            message: message,
            conversation_id: conversation_id,
        };
        $.ajax({
            type: "POST",
            url: `/chat/${conversation_id}/send`,
            data: formData,
            success: function (response) {
                console.log("Data saved successfully");
                form.find('input[name="message"]').val("");
                loadMessages();
                scrollToBottom();
            },
            error: function (error) {
                console.error("Error saving data:", error);
            },
        });
    });
});
function loadMessages() {
    const chatbox = ".chat-box";
    $(chatbox).load(location.href + " " + chatbox);
}
$(document).ready(function () {
    // Scroll to the bottom of the chat container initially
    $("#chat-container").scrollTop($("#chat-container")[0].scrollHeight);

    // This function can be used to scroll to the bottom of the chat container when new messages arrive

    // Call scrollToBottom whenever new messages are added to the chat box
    // Example usage: scrollToBottom();

    // Optionally, you can also add a button or other UI element to trigger scrolling to the bottom manually.
});
function scrollToBottom() {
    $("#chat-container").animate(
        {
            scrollTop: $("#chat-container")[0].scrollHeight,
        },
        500
    ); // You can adjust the animation duration as needed
}
