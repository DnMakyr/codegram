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
