$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    function clickButtonInfo() {
        $(".btn-info").on("click", function (e) {
            e.preventDefault();
            var productId = $(this).data("id");
            var url = "/admin/product/info/" + productId;
            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response[0].name);

                    $("#title").html(response[0].name);
                    $("#description").html(response[0].description);

                    $("#myModal-info").modal("show");
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                },
            });
        });
    }
    clickButtonInfo();
});
