$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    var table = $("#dataTable").DataTable();

    function clickButtonDelete() {
        $(".btn-danger").click(function (e) {
            e.preventDefault();

            var id = $(this).data("id");
            $(this).prop("disabled", true);

            $.ajax({
                url: "/admin/material/destroy/" + id,
                type: "DELETE",
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $("#material-" + id).remove();
                        console.log("Material deleted successfully!");
                    } else {
                        console.error(
                            "Error deleting material:",
                            response.message
                        );
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("Error:", textStatus, errorThrown);
                },
            });
        });
    }

    function clickButtonUpdate() {
        $(".btn-warning").on("click", function (e) {
            e.preventDefault();
            var materialId = $(this).data("id");
            var url = "/admin/material/edit/" + materialId;
            $(this).prop("disabled", true);

            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $("#nameU").val(response[0].name);
                    $("#nameU").attr(
                        "placeholder",
                        "Old data: " + response[0].name
                    );
                    $("#cateU").val(response[0].category);
                    $("#cateU").attr(
                        "placeholder",
                        "Old data: " + response[0].category
                    );
                    $("#unitU").val(response[0].unit);
                    $("#unitU").attr(
                        "placeholder",
                        "Old data: " + response[0].unit
                    );
                    $("#edit-form").attr(
                        "action",
                        "/admin/material/update/" + materialId
                    );
                    $("#myModal-edit").modal("show");
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                },
            });
        });
    }
    clickButtonDelete();
    clickButtonUpdate();

    table.on("draw", function () {
        clickButtonDelete();
        clickButtonUpdate();
    });
});
