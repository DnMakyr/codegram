$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $image_resize = $("#image_demo").croppie({
        enableExif: true,
        viewport: { width: 600, height: 300 },
        boundary: { width: 700, height: 700 },
        showZoomer: true,
        enableResize: true,
        enableOrientation: true,
        mouseWheelZoom: "ctrl",
    });

    $("#image").on("change", function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $image_resize
                .croppie("bind", {
                    url: e.target.result,
                })
                .then(function () {
                    console.log("jQuery bind complete");
                });
        };
        reader.readAsDataURL(this.files[0]);
        $("#resizeModal").modal("show");
    });

    $(".resize").click(function (event) {
        $image_resize
            .croppie("result", {
                type: "canvas",
                size: "viewport",
                format: "png",
                quality: 1,
            })
            .then(function (response) {
                // Send the resized image data to the server
                $.ajax({
                    url: "/p/create",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        image: response,
                        caption: $("#caption").val(), // Get the caption from an input field
                    },
                    success: function (data) {
                        $("#resizeModal").modal("hide");
                        console.log("Image resized and uploaded");
                    },
                });
            });
    });
});
