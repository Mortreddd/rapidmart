import { Modal } from "flowbite";
export { openModal, closeModal };

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
    const openModal = new Modal($myEl);
    openModal.hide();
    document.querySelector("body > div[modal-backdrop]")?.remove();
}

$("#addproduct").on("click", function () {
    openModal("add-product-modal");
});

$("#close-add-product-modal-form").on("click", function () {
    $("#storeProduct").find("span").text("");
    closeModal("add-product-modal");
});

$("#close-edit-product-modal-form").on("click", function () {
    $("#editProduct").find("span").text("");
    $("#editProduct").find("input").val("");
    closeModal("edit-product-modal");
});
