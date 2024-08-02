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

    function row() {
        return `
         <td class="stt"></td>
        <td>
            <select class="custom-select mr-sm-2 name" name="material[]">
                <option selected disabled>Chọn...</option>
                <option value="chef">Chef</option>
                <option value="chef">Chef</option>
            </select>
        </td>
        <td>
            <div class="form-group">
                <input type="number" class="form-control price" name="price[]">
            </div>
        </td>
        <td>
            <div class="form-group">
                <input type="number" class="form-control numberOfUnit" name="numberOfUnit[]">
            </div>
        </td>
        <td>
            <a href="" class="btn btn-danger btn-circle btn-sm btn-delete-row" style="margin-top: 5px;">
                <i class="fas fa-trash"></i>
            </a>
        </td>
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
});
