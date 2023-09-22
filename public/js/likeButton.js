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
                console.log(postId);
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
    $(buttonId).html("")
    $(buttonId).load(location.href + " " + buttonId);
}
