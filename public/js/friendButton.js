$(document).ready(function () {
    $(".unfriendOption").click(function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        var friendName = $(this).data("friend-name");
        if (confirm(`Are you sure you want to unfriend ${friendName}?`)) {
            $.ajax({
                type: "GET",
                url: `/unfriend/${friendId}`,
                data: {
                    _token: $("input[name='_token']").val(), // Include CSRF token
                },
                success: function (response) {
                    alert("You have unfriended " + friendName);
                    loadButton(friendId);
                },
                error: function (error) {
                    alert(error.responseJSON.message);
                },
            });
        }
    });
});

function loadButton(userId) {
    let containerId = "#button-container-" + userId;
    $(containerId).load(location.href + " " + containerId);
}

$(document).ready(function () {
    $(".addFriendButton").click(function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        $.ajax({
            type: "GET",
            url: `/addfriend/${friendId}`,
            data: {
                _token: $("input[name='_token']").val(), // Include CSRF token
            },
            success: function (response) {
                console.log(response);
                loadButton(friendId);
            },
            error: function (error) {
                alert(error.responseJSON.message);
            },
        });
    });
});
$(document).ready(function () {
    $(".cancelButton").click(function (e) {
        e.preventDefault();
        var friendId = $(this).data("user-id");
        $.ajax({
            type: "GET",
            url: `/cancel/${friendId}`,
            data: {
                _token: $("input[name='_token']").val(), // Include CSRF token
            },
            success: function (response) {
                console.log(response);
                loadButton(friendId);
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            },
        });
    });
});
$(document).ready(function () {
    $(".acceptOption").click(function (e) {
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
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            },
        });
    });
});
$(document).ready(function () {
    $(".declineOption").click(function (e) {
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
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            },
        });
    });
});
