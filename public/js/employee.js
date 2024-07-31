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
                    $(
                        "input[name='genderU'][value='" +
                            response[0].gender +
                            "']"
                    ).prop("checked", true);

                    $("#roleU").val(response[0].role);
                    $("#roleU").attr(
                        "placeholder",
                        "Old data: " + response[0].role
                    );
                    $("#gmailU").val(response[0].gmail);
                    $("#gmailU").attr(
                        "placeholder",
                        "Old data: " + response[0].gmail
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
                    $("#phoneU").val(response[0].phone);
                    $("#phoneU").attr(
                        "placeholder",
                        "Old data: " + response[0].phone
                    );
                    $("#statusU").val(response[0].status);
                    $("#statusU").attr(
                        "placeholder",
                        "Old data: " + response[0].status
                    );
                    $("#addressU").val(response[0].address);
                    $("#addressU").attr(
                        "placeholder",
                        "Old data: " + response[0].address
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
