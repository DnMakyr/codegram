document.addEventListener("DOMContentLoaded", function () {
    const openNotifications = document.getElementById("openNotifications");
    const notificationSidebar = document.getElementById("notificationSidebar");

    // Initially hide the notification sidebar
    let isSidebarVisible = false;

    openNotifications.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the default behavior of the anchor element

        // Toggle the visibility of the sidebar
        if (isSidebarVisible) {
            notificationSidebar.style.display = "none"; // Hide the sidebar
        } else {
            notificationSidebar.style.display = "block"; // Show the sidebar
            const notificationIcons =
                notificationSidebar.querySelectorAll("img");

            // Toggle the visibility of icons inside the notificationSidebar
            notificationIcons.forEach(function (icon) {
                icon.style.display =
                    icon.style.display === "none" ? "" : "none";
            });
            // Send an HTTP request to a server endpoint to mark all notifications as read.
            $.ajax({
                url: "/readnotification", // Replace with your actual server endpoint URL
                type: "GET", // Use POST or another appropriate HTTP method
                success: function (response) {
                    $(".notification-count").hide();
                },
                error: function (error) {
                    // Handle errors if the request fails.
                    console.error(
                        "Error marking notifications as read:",
                        error
                    );
                },
            });
        }

        isSidebarVisible = !isSidebarVisible; // Toggle the state
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const sidebarLinks = document.querySelectorAll(".nav-link");

    // Get the current URL
    const currentURL = window.location.pathname;

    // Loop through each sidebar link
    sidebarLinks.forEach(function (link) {
        const linkURL = link.getAttribute("href");

        // Check if the current URL matches the link's URL
        if (currentURL === linkURL) {
            // Add a CSS class to highlight the active link
            link.classList.add("isActive");
        }
    });
});
