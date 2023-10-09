$(function () {
    $(document).on("click", ".likeButton", function (e) {
        let postId = $(this).data("post-id");
        // let status =
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: `/like/${postId}`,
            data: {
                _token: $("input[name='_token']").val(),
            },
            success: function (response) {
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
