$(document).ready(function () {
    // Handle form submission
    $(".searchButton").on("click", function (e) {
        e.preventDefault(); // Prevent the default form submission behavior

        // Get the search query from the input field
        var searchText = $("#searchText").val();

        // Perform AJAX request
        $.ajax({
            type: "GET",
            url: "/search", // Replace with the actual URL for handling the search
            data: { searchText: searchText }, // Pass the search query as a parameter
            success: function (data) {
                // Clear previous search results
                load();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
function load(){
    let searchId =' #searchResults';
    $(searchId).load(location.href + searchId);
}