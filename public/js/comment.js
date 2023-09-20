$(document).on("click", ".delete-comment-link", function (e) {
    e.preventDefault();
    var commentId = $(this).data("comment-id");
    var postId = $(this).closest(".card").find('input[name="postId"]').val(); // Get the post ID associated with the comment

    if (confirm("Are you sure you want to delete this comment?")) {
        $.ajax({
            type: "DELETE",
            url: `/comment/delete/${commentId}`,
            data: {
                _token: $("input[name='_token']").val(), // Include CSRF token
            },
            success: function (response) {
                alert(response.message);
                loadComments(postId); // Reload comments for the specific post
            },
            error: function (error) {
                alert(error.responseJSON.message);
            },
        });
    }
});

function loadComments(postId) {
    let containerId = "#comments-container-" + postId;
    $(containerId).load(location.href + " " + containerId);
}

$(document).ready(function () {
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
// $document.ready(function () {
//     $(".editComment").submit(function (event) {
//         event.preventDefault();

//         var form = $(this);

//         var commentId = form.find('input[name="commentId"]').val();
//         var content = form.find('input[name="newContent"]').val();
//         var postId = form.find('input[name="postId"]').val();

//         var formData = {
//             _token: $("input[name='_token']").val(),
//             content: content,
//             commentId: commentId,
//             postId: postId,
//         };

//         $.ajax({
//             type: "PATCH",
//             url: `/comment/edit`,
//             data: formData,
//             success: function (response) {
//                 console.log("Data updated successfully");
//             },
//             error: function (error) {
//                 console.error("Error updating data:", error);
//             },
//         });
//     });
// });
const editModal = document.getElementById("editModal");

editModal.addEventListener("show.bs.modal", function (event) {
    const trigger = event.relatedTarget;
    const commentId = trigger.getAttribute("data-comment-id");
    const postId = trigger.getAttribute("data-post-id"); 
    
});
