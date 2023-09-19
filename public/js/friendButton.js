var dropdownItems = document.querySelectorAll('.friend-action');

    // Attach a click event listener to each dropdown item
    dropdownItems.forEach(function(item) {
        item.addEventListener('click', function(event) {
            // Prevent the default behavior of the link click (page reload)
            event.preventDefault();

            // Now, you can perform any additional actions here
            // For example, you can send an AJAX request to perform the desired action
            // Here's a sample AJAX request using the Fetch API:
            fetch(item.getAttribute('href'), {
                method: 'GET', // You can change the HTTP method as needed
            })
            .then(function(response) {
                // Handle the response here (e.g., update the UI)
            })
            .catch(function(error) {
                // Handle any errors here
            });
        });
    });




