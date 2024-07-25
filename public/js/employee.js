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
                console.log("Employ-delete-Id :", id);

                $("#confirm-delete-btn").data("id", id);

                // Confirm delete Button
                $("#confirm-delete-btn").click(function (e) {
                    e.preventDefault();
                    var deleteId = $(this).data("id");
                    console.log("Employ-confirm-delete-Id :", deleteId);

                    $.ajax({
                        url: "/admin/employee/destroy/" + deleteId,
                        type: "DELETE",
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                $("#employee-" + deleteId).remove();
                                $("#myModal-delete").modal("hide");
                                console.log("Employee deleted successfully!");
                            } else {
                                console.error(
                                    "Error deleting employee:",
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
            var employeeId = $(this).data("id");
            console.log(employeeId);
            var url = "/admin/employee/edit/" + employeeId;
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
                    $("#gendU").val(response[0].gender);
                    $("#gendU").attr(
                        "placeholder",
                        "Old data: " + response[0].gender
                    );
                    $("#roleU").val(response[0].role);
                    $("#roleU").attr(
                        "placeholder",
                        "Old data: " + response[0].role
                    );
                    $("#phonU").val(response[0].phone);
                    $("#phonU").attr(
                        "placeholder",
                        "Old data: " + response[0].phone
                    );
                    $("#addrU").val(response[0].address);
                    $("#addrU").attr(
                        "placeholder",
                        "Old data: " + response[0].address
                    );
                    $("#statU").val(response[0].status);
                    $("#statU").attr(
                        "placeholder",
                        "Old data: " + response[0].status
                    );
                    $("#edit-form").attr(
                        "action",
                        "/admin/employee/update/" + employeeId
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

const statusList = document.querySelectorAll(".statusEmployee");
statusList.forEach((element) => {
    var status = element.dataset.id;
    switch (status) {
        case "working":
            element.style.color = "rgb(23, 166, 115)";
            break;
        case "resigned":
            element.style.color = "rgb(224, 45, 27)";
            break;
        case "probation":
            element.style.color = "rgb(46, 89, 217)";
            break;
        default:
            break;
    }
});
