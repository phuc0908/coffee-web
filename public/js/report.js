$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).ready(function () {
    var tableIn = $("#tableIn").DataTable();

    const addRowIn = document.getElementById("add-row-in");
    const addRowOut = document.getElementById("add-row-out");
    const tableBodyIn = document.querySelector(".table-add-in tbody");
    const tableBodyOut = document.querySelector(".table-add-out tbody");
    const clearIn = document.getElementById("clear-in");
    const clearOut = document.getElementById("clear-out");

    var dataContainer = document.getElementById("data-container");
    var data = JSON.parse(dataContainer.getAttribute("data-json"));

    // Hàm để tạo một hàng mới với dữ liệu
    function row() {
        console.log(data);
        return `
        <tr>
            <td class="stt"></td>
            <td>
                <select class="custom-select mr-sm-2 name" name="materials[]">
                    <option selected disabled>----Choose------</option>
                    ${data
                        .map(
                            (item) =>
                                `<option value="${item.id}">${item.id}: ${item.name}</option>`
                        )
                        .join("")}
                </select>
            </td>
            <td>
                <div class="form-group">
                    <input type="number" class="form-control price" name="prices[]">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="number" class="form-control numberOfUnit" name="numberOfUnits[]">
                </div>
            </td>
            <td>
                <a href="" class="btn btn-danger btn-circle btn-sm btn-delete-row" style="margin-top: 5px;">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
    `;
    }
    // REPORT IN CLICK
    addRowIn.addEventListener("click", function (e) {
        e.preventDefault();
        const newRow = document.createElement("tr");
        newRow.innerHTML = row();
        tableBodyIn.appendChild(newRow);
        deleteRow(newRow, tableBodyIn);
        updateSTT(tableBodyIn);
    });
    // REPORT OUT CLICK
    addRowOut.addEventListener("click", function (e) {
        e.preventDefault();
        const newRow = document.createElement("tr");
        newRow.innerHTML = row();
        tableBodyOut.appendChild(newRow);
        deleteRow(newRow, tableBodyOut);
        updateSTT(tableBodyOut);
    });
    // CLEAR IN CLICK
    clearIn.addEventListener("click", function (e) {
        e.preventDefault();
        tableBodyIn.innerHTML = "";
    });

    // CLEAR OUT CLICK
    clearOut.addEventListener("click", function (e) {
        e.preventDefault();
        tableBodyOut.innerHTML = "";
    });
    // DELETE ROW
    function deleteRow(tr, tbody) {
        const deleteButton = tr.querySelector(".btn-delete-row");
        deleteButton.addEventListener("click", (event) => {
            event.preventDefault();
            tr.remove();
            updateSTT(tbody);
        });
    }
    // UPDATE STT
    function updateSTT(tbody) {
        const rows = tbody.querySelectorAll("tr");
        rows.forEach((row, index) => {
            const sttCell = row.querySelector(".stt");
            sttCell.textContent = index + 1;
        });
    }

    const btnDeletes = document.querySelectorAll(".btn-delete");

    function clickButtonDelete() {
        btnDeletes.forEach((element) => {
            element.addEventListener("click", function (e) {
                e.preventDefault();
                $("#myModal-delete").modal("show");

                var id = $(this).data("id");
                console.log("Report-delete-Id :", id);

                $("#confirm-delete-btn").data("id", id);

                // Confirm delete Button
                $("#confirm-delete-btn").click(function (e) {
                    e.preventDefault();
                    var deleteId = $(this).data("id");
                    var type = $(this).data("type");
                    console.log("Report-confirm-delete-Id :", deleteId);
                    console.log("Report-confirm-delete-type :", type);

                    $.ajax({
                        url:
                            "/admin/report/destroy/" +
                            deleteId +
                            "/type=" +
                            type,
                        type: "DELETE",
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                $("#report-" + deleteId).remove();
                                $("#myModal-delete").modal("hide");
                                console.log("Report deleted successfully!");
                            } else {
                                console.error(
                                    "Error deleting report:",
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
            var reportId = $(this).data("id");
            console.log(reportId);
            var url = "/admin/report/edit/" + reportId;

            console.log(url);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log("success");
                    $("#nameU").val(response[0].name);
                    $("#nameU").attr(
                        "placeholder",
                        "Old data: " + response[0].name
                    );

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

                    $("#edit-form").attr(
                        "action",
                        "/admin/report/update/" + reportId
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
});

function updateTypeColors() {
    const typeList = document.querySelectorAll(".typeReport");
    typeList.forEach((element) => {
        var type = element.dataset.type;
        switch (type) {
            case "out":
                element.style.color = "rgb(23, 166, 115)";
                break;
            case "in":
                element.style.color = "rgb(224, 45, 27)";
                break;
            default:
                break;
        }
    });
}
updateTypeColors();
