// Save follow state to local storage when toggling
function toggleFollow() {
    const followButton = document.getElementById("followButton");
    const userId = followButton.getAttribute("user-id");
    const follows = followButton.getAttribute("follows");

    // Toggle the 'follows' attribute
    followButton.setAttribute("follows", follows === "true" ? "false" : "true");

    // Function to update follow state in local storage
    function updateLocalStorage(follows) {
        localStorage.setItem(
            `followState_${userId}`,
            follows ? "true" : "false"
        );
    }

    if (follows === "true") {
        updateLocalStorage(false);
        followButton.textContent = "Follow";
        followButton.style.backgroundColor = "#0275d8";
        followButton.style.color = "white";
        followButton.style.borderStyle = "none";

        // Remove the following-button class
        followButton.classList.remove("following-button");

        axios
            .post("/follow/" + userId)
            .then((response) => {
                console.log(response.data);
            })
            .catch((error) => {
                if (error.response && error.response.status === 401) {
                    window.location = "/login";
                }
            });
    } else {
        updateLocalStorage(true);
        followButton.textContent = "Following";

        // Add the following-button class
        followButton.classList.add("following-button");

        axios
            .post("/follow/" + userId)
            .then((response) => {
                console.log(response.data);
            })
            .catch((error) => {
                if (error.response && error.response.status === 401) {
                    window.location = "/login";
                }
            });
    }
}

// Retrieve follow state from local storage when the page loads
window.addEventListener("load", () => {
    const followButton = document.getElementById("followButton");
    const userId = followButton.getAttribute("user-id");

    const storedFollowState = localStorage.getItem(`followState_${userId}`);
    if (storedFollowState === "true") {
        followButton.classList.add("following-button");
        followButton.textContent = "Following";
    }
});
