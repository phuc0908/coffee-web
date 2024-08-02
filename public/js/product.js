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
                console.log("product-delete-Id :", id);

                $("#confirm-delete-btn").data("id", id);

                // Confirm delete Button
                $("#confirm-delete-btn").click(function (e) {
                    e.preventDefault();
                    var deleteId = $(this).data("id");
                    console.log("Employ-confirm-delete-Id :", deleteId);

                    $.ajax({
                        url: "/admin/product/destroy/" + id,
                        type: "DELETE",
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                $("#product-" + id).remove();
                                $("#myModal-delete").modal("hide");
                                console.log("product deleted successfully!");
                            } else {
                                console.error(
                                    "Error deleting product:",
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

    let editorInstances = {};

    // Khởi tạo CKEditor cho mỗi textarea
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            editorInstances["editor"] = editor;
            console.log("Editor initialized", editor);
        })
        .catch((error) => {
            console.error("Error initializing Editor", error);
        });

    ClassicEditor.create(document.querySelector("#editorU"))
        .then((editor) => {
            editorInstances["editorU"] = editor;
            console.log("EditorU initialized", editor);
        })
        .catch((error) => {
            console.error("Error initializing EditorU", error);
        });

    function clickButtonUpdate() {
        $(".btn-warning").on("click", function (e) {
            e.preventDefault();
            var productId = $(this).data("id");
            var url = "/admin/product/edit/" + productId;
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
                    $("#pricU").val(response[0].price);
                    $("#pricU").attr(
                        "placeholder",
                        "Old data: " + response[0].price
                    );
                    if (response[0].description !== null) {
                        editorInstances["editorU"].setData(
                            response[0].description
                        );
                    }
                    $("#edit-form").attr(
                        "action",
                        "/admin/product/update/" + productId
                    );
                    $("#myModal-edit").modal("show");
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                },
            });
        });
    }
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
                    $("#myModal-info").modal("show");
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
