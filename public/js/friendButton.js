// Get all friend action links and buttons
const friendActionLinks = document.querySelectorAll(".friend-action");
const friendButtons = document.querySelectorAll(".cancelButton, .addButton");

friendActionLinks.forEach((link) => {
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
    });
});

friendButtons.forEach((button) => {
    button.addEventListener("click", function () {
        const userId = this.getAttribute("user-id");
        const action = this.textContent.trim(); // Get the action from the button text

        // Define the route based on the selected action
        let route = "";
        switch (action) {
            case "Add Friend":
                route = `/addfriend/${userId}`;
                break;
            case "Cancel":
                route = `/cancel/${userId}`;
                break;
        }

        // Send an AJAX request to the appropriate route
        axios
            .get(route) // Use GET for simplicity, consider using POST for security
            .then((response) => {
                // Handle the response here (e.g., update the button text or style)
                if (response.data.success) {
                    // Handle success (e.g., display a success message)
                    console.log("Action successful");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    });
});
