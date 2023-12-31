
$(function () {
    $(document).on("click", ".unfriendOption", function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        var friendName = $(this).data("friend-name");
        if (confirm(`Are you sure you want to unfriend ${friendName}?`)) {
            $.ajax({
                type: "get",
                url: `/unfriend/${friendId}`,
                data: {
                    _token: $("input[name='_token']").val(), // Include CSRF token
                },
                success: function (response) {
                    alert("You have unfriended " + friendName);
                    loadButton(friendId);
                    loadFollow();
                },
                error: function (error) {
                    alert(error.responseJSON.message);
                },
            });
        }
    });
    function loadFollow() {
        const followButton = "#followButton";
        $(followButton).html("");
        $(followButton).load(location.href + " " + followButton);
    }

    function loadButton(userId) {
        let containerId = "#button-container-" + userId;
        $(containerId).load(location.href + " " + containerId);
    }
    $(document).on("click", ".addFriendButton", function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        $.ajax({
            type: "GET",
            url: `/addfriend/${friendId}`,
            data: {
                _token: $("input[name='_token']").val(), // Include CSRF token
            },
            success: function (response) {
                pusher.subscribe("user." + friendId);
                loadButton(friendId);
                loadFollow();
            },
            error: function (error) {
                alert(error.responseJSON.message);
            },
        });
    });

    $(document).on("click", ".cancelButton", function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        $.ajax({
            type: "GET",
            url: `/cancel/${friendId}`,
            data: {
                _token: $("input[name='_token']").val(), // Include CSRF token
            },
            success: function (response) {
                loadButton(friendId);
                loadFollow();
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            },
        });
    });

    $(document).on("click", ".acceptOption", function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        $.ajax({
            type: "GET",
            url: `/accept/${friendId}`,
            data: {
                _token: $("input[name='_token']").val(), // Include CSRF token
            },
            success: function (response) {
                console.log(response);
                loadButton(friendId);
                loadFollow();
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            },
        });
    });

    $(document).on("click", ".declineOption", function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        $.ajax({
            type: "GET",
            url: `/decline/${friendId}`,
            data: {
                _token: $("input[name='_token']").val(), // Include CSRF token
            },
            success: function (response) {
                console.log(response);
                loadButton(friendId);
                loadFollow();
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            },
        });
    });
});