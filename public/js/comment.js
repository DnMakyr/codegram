document.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-comment-link")) {
        event.preventDefault();
        const commentId = event.target.getAttribute("data-comment-id");

        if (confirm("Are you sure you want to delete this comment?")) {
            axios
                .delete(`comment/delete/${commentId}`)
                .then(function (response) {
                    alert(response.data.message);
                    // Reload the comments container after a successful deletion
                    loadComments();
                })
                .catch(function (error) {
                    alert(error.response.data.message);
                });
        }
    }
});

function loadComments() {
    $("#comments-container").load(location.href + " #comments-container");
}

document.addEventListener('DOMContentLoaded', function () {
    const contentInput = document.getElementById('content');

    contentInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent the default form submission
            saveComment();
            loadComments();
        }
    });

    function saveComment() {
        const content = contentInput.value.trim();
        const postId = document.querySelector('input[name="postId"]').value;

        if (content) {
            axios.post('comment', {  // Use the correct route name here
                content: content,
                postId: postId
            })
            .then(function (response) {
                // Handle success, e.g., update the UI
                console.log(response.data);
                contentInput.value = ''; // Clear the input field
            })
            .catch(function (error) {
                // Handle error, e.g., display an error message
                console.log(error);
            });
        }
    }
});
