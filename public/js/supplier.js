$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    var table = $("#dataTable").DataTable();
    const btnDeletes = document.querySelectorAll(".btn-delete");

    function clickButtonDelete() {
        btnDeletes.forEach((element) => {
            element.addEventListener("click", function (e) {
                e.preventDefault();
                $("#myModal-delete").modal("show");

                var id = $(this).data("id");
                console.log("Supplier-delete-Id :", id);

                $("#confirm-delete-btn").data("id", id);

                // Confirm delete Button
                $("#confirm-delete-btn").click(function (e) {
                    e.preventDefault();
                    var deleteId = $(this).data("id");
                    console.log("Supplier-confirm-delete-Id :", deleteId);

                    $.ajax({
                        url: "/admin/supplier/destroy/" + deleteId,
                        type: "DELETE",
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                $("#supplier-" + deleteId).remove();
                                $("#myModal-delete").modal("hide");
                                console.log("Supplier deleted successfully!");
                            } else {
                                console.error(
                                    "Error deleting supplier:",
                                    response.message
                                );
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.error("Error:", textStatus, errorThrown);
                        },
                    });
                });
            });
        });
    }

    function clickButtonEdit() {
        $(".btn-warning").on("click", function (e) {
            e.preventDefault();
            var supplierId = $(this).data("id");
            console.log(supplierId);
            var url = "/admin/supplier/edit/" + supplierId;

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
                    $("#gmailU").val(response[0].gmail);
                    $("#gmailU").attr(
                        "placeholder",
                        "Old data: " + response[0].gmail
                    );
                    $("#phoneU").val(response[0].phone);
                    $("#phoneU").attr(
                        "placeholder",
                        "Old data: " + response[0].phone
                    );
                    $("#addressU").val(response[0].address);
                    $("#addressU").attr(
                        "placeholder",
                        "Old data: " + response[0].address
                    );
                    $("#edit-form").attr(
                        "action",
                        "/admin/supplier/update/" + supplierId
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
    clickButtonEdit();

    table.on("draw", function () {
        clickButtonDelete();
        clickButtonEdit();
    });
});
