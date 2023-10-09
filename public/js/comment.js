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
// const editModal = document.getElementById("editModal");

// editModal.addEventListener("show.bs.modal", function (event) {
//     const trigger = event.relatedTarget;
//     const commentId = trigger.getAttribute("data-comment-id");
//     const postId = trigger.getAttribute("data-post-id"); 
    
// });
