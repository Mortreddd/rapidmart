import { Modal } from "flowbite";
export { openModal, closeModal, hello };

function openModal(el) {
    let $myEl = document.getElementById(el);
    // options with default values
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
    // options with default values
    let o = {
        placement: "bottom-right",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
        closable: false,
    };

    const openModal = new Modal($myEl, o);
    openModal.hide();
}

function hello() {
    alert("hello");
}

$("#openform").on("click", function () {
    openModal("form-modal");
});

$("#close-form").on("click", function () {
    closeModal("form-modal");
});

$("#edit-close-form").on("click", function () {
    closeModal("edit-modal");
    $("#editstatus").val("");
    $("#editdescription").val("");
    $("#qrID").val(0);
    $("#editPOF_current").html("");
    $("#nothing_error").html("");
});

$("#cancel-delete").on("click", function () {
    new qr.closeModal("delete-modal");
});

$("#cancel-request").on("click", function () {
    new qr.closeModal("request-modal");
});
