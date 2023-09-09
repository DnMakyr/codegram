// import axios from "axios";
// Define a variable to track the follow state
let isFollowing = false;
// Function to toggle the follow state
function toggleFollow() {
    const followButton = document.getElementById("followButton");
    const userId = document
        .getElementById("followButton")
        .getAttribute("user-id");

    if (isFollowing) {
        followButton.textContent = "Follow";
        followButton.style.backgroundColor = "#0275d8";
        followButton.style.color = "white";
        followButton.style.borderStyle = "none";
        axios.post("/follow/" + userId).then((response) => {
            console.log(response.data);
        });
        
        
    } else {
        followButton.textContent = "Following";
        followButton.style.color = "black";
        followButton.style.backgroundColor = "#D3D3D3";
        axios.post("/follow/" + userId).then((response) => {
            console.log(response.data);
        });
    }
    // axios.post('/follow/' + userId).then(response => {
    //     console.log(response.data);
    // });
    isFollowing = !isFollowing;
}
