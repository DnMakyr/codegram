$(document).ready(function () {
    let nextPageUrl = "{{ $posts->nextPageUrl() }}";
    $(window).scroll(function () {
        if (
            $(window).scrollTop() + $(window).height() >=
            $(document).height() - 10
        ) {
            if (nextPageUrl) {
                loadMorePosts(nextPageUrl); // Pass nextPageUrl as a parameter
            }
        }
    });
});

function loadMorePosts(nextPageUrl) { // Accept nextPageUrl as a parameter
    $.ajax({
        url: nextPageUrl,
        type: "get",
        beforeSend: function () {
            nextPageUrl = "";
        },
        success(data) {
            nextPageUrl = data.nextPageUrl;
            $("#posts-container").append(data.view);
        },
        error(xhr, status, error) {
            console.log(status, error);
        },
    });
}
