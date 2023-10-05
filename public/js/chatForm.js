// $(function () {
//     $("#chatForm").on("submit", function (e) {
//         e.preventDefault();
//         let form = $(this);
//         let message = form.find('input[name="message"]').val();
//         let conversation_id = form.find('input[name="conversation_id"]').val();
//         let formData = {
//             _token: $("input[name='_token']").val(),
//             message: message,
//             conversation_id: conversation_id,
//         };
//         $.ajax({
//             type: "POST",
//             url: `/chat/${conversation_id}/send`,
//             // headers: {
//             //     "X-Socket-Id": pusher.connection.socket_id,
//             // },
//             data: formData,
//             success: function (res) {
//                 console.log("Data saved successfully");
//                 form.find('input[name="message"]').val(""); // Clear the input field
            
//                 // Append the sent message to the chat container
//                 const messagesContainer = $("#messages");
//                 messagesContainer.append(`<div>${formData.message}</div>`); // Assuming that `res` contains the HTML for the sent message
            
//                 // Scroll to the bottom of the chat container to show the new message
//                 messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
//             },
//             error: function (error) {
//                 console.error("Error saving data:", error);
//             },
//         });
//     });
// });
// function loadMessages() {
//     const chatbox = ".chat-box";
//     $(chatbox).load(location.href + " " + chatbox);
// }
// $(document).ready(function () {
//     // Scroll to the bottom of the chat container initially
//     $("#chat-container").scrollTop($("#chat-container")[0].scrollHeight);

//     // This function can be used to scroll to the bottom of the chat container when new messages arrive

//     // Call scrollToBottom whenever new messages are added to the chat box
//     // Example usage: scrollToBottom();

//     // Optionally, you can also add a button or other UI element to trigger scrolling to the bottom manually.
// });
// function scrollToBottom() {
//     // noinspection JSJQueryEfficiency
//     $("#chat-container").animate(
//         {
//             scrollTop: $("#chat-container")[0].scrollHeight,
//         },
//         500
//     ); // You can adjust the animation duration as needed
// }
