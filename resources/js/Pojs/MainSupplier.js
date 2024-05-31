import { Modal } from "flowbite";

export {
    storeSupplier,
    getSupplier,
    openModal,
    closeModal,
    closedelete,
    openDeleteModal,
    editSupplier,
    opendelete,
};

function openModal(el) {
    let $myEl = document.getElementById(el);
    let o = {
        placement: "bottom-right",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
        closable: false,
    };

    const openModal = new Modal($myEl, o);
    openModal.show();
}

function closeModal(el) {
    let $myEl = document.getElementById(el);
    const openModal = new Modal($myEl);
    openModal.hide();
    document.querySelector("body > div[modal-backdrop]")?.remove();
}

//! end

function openEditModal() {
    const $OEM = document.getElementById("edit-toast");
    const em = new Modal($OEM);
    em.show();
}

function openDeleteModal() {
    const $odm = document.getElementById("delete-toast");
    const dm = new Modal($odm);
    dm.show();
}

//!end

function closedelete() {
    const $b = document.getElementById("delete-modal");
    const d = new Modal($b);
    d.hide();
}
function opendelete() {
    openModal("delete-modal");
}

function closeedit() {
    const $ed = document.getElementById("edit-modal");
    const med = new Modal($ed);
    med.hide();
}

// * Store-Form-Modal
$("#open-form").on("click", () => {
    openModal("form-modal");
});

$("#close-form").on("click", () => {
    closeModal("form-modal");
});

function storeSupplier(url, formData) {
    // AJAX request
    $.ajax({
        url: url,
        data: formData,
        type: "POST",
        contentType: false,
        processData: false,
        beforeSend: () => {
            $("#saveSupplier").prop("disabled", true);
        },
        complete: () => {
            $("#saveSupplier").prop("disabled", false);
        },
        success: (result) => {
            if (result.status == "success") {
                closeModal("form-modal");
                openModal("static-modal");
                setTimeout(location.reload(true), 1000);
            } else if (result.status == "error") {
                $("#storeSupplier").find("span").text("");
                $.each(result.errors, function (key, value) {
                    var showerror = $(document).find("#" + key + "_erroradd");
                    showerror.html(value);
                });
            }
        },
        error: (error) => {
            console.log(error.responseText);
        },
    });
}

// * Store-Form-Modal END

$("#close-s-Modal").on("click", () => {
    closeModal("static-modal");
});

$("#edit-close-form").on("click", () => {
    closeedit();
    $("#SupplierNameEdit").html("");
    $("#edit_id").val("");
    $("#edit_name").val("");
    $("#edit_address").val("");
    $("#edit_email").val("");
    $("#edit_description").val("");
    $("#pictureFile").html("");
});

//edit
function editSupplier(url, formData) {
    // AJAX request
    $.ajax({
        url: url,
        data: formData,
        type: "POST",
        contentType: false,
        processData: false,
        beforeSend: () => {
            $("#saveEditSupplier").prop("disabled", true);
        },
        complete: () => {
            $("#saveEditSupplier").prop("disabled", false);
        },
        success: (result) => {
            if (result.status == "success") {
                closeedit();
                $("#editSupplier").find("span").text("");
                $("#editSupplier")[0].reset();
                openEditModal();
                setTimeout(location.reload(true), 1000);
            } else if (result.status == "error") {
                $("#storeSupplier").find("span").text("");
                $.each(result.errors, function (key, value) {
                    var showerror = $(document).find("#" + key + "_error");
                    showerror.html(value);
                });
            } else if (result.status == "nothing") {
                $("#isChanged").html(
                    "Theres Nothing to Change Please Update Something"
                );
            }
        },
        error: (error) => {
            console.log(error.responseText);
        },
    });
}

function getSupplier(url, id) {
    // AJAX request
    $.ajax({
        url: url,
        data: {
            id: id,
        },
        type: "GET",

        success: (result) => {
            // console.log("🚀 ~ getSupplier ~ result:", result);
            $("#SupplierNameEdit").html(result.company_name);
            $("#edit_id").val(result.id);
            $("#edit_name").val(result.company_name);
            $("#edit_address").val(result.address);
            $("#edit_email").val(result.email);
            $("#edit_description").val(result.description);
            $("#pictureFile").html(
                "Current Picture: " + result.picture.split("/")[1]
            );
            openModal("edit-modal");
        },
        error: (error) => {
            console.log(error.responseText);
        },
    });
}
