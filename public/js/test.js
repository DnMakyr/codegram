const test = document.querySelectorAll(".test");

test.forEach((link) => {
    link.addEventListener("click", function () {
        const userId = this.getAttribute("user-id");
        const action = this.textContent.trim(); // Get the action from the link text

        // Define the route based on the selected action
        let route = "";
        switch (action) {
            case "Accept":
                route = "/accept/" + userId;
                break;
            case "Decline":
                route = "/decline/" + userId;
                break;
            case "Unfriend":
                route = "/unfriend/" + userId;
                break;
            default:
                break;
        }

        // Send an AJAX request to the appropriate route
        axios
            .get(route)
            .then((response) => {
                if (response.data.success) {
                    // Handle success (e.g., display a success message)
                    console.log(response.data);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
        console.log("Inside click event handler");
        console.log("Action:", action);
        console.log("User ID:", userId);
    });
});
