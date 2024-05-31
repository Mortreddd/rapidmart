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

$("#close-description").on("click", function () {
    closeModal("description-modal");
});

$("#delete-btn").on("click", () => {
    openModal("delete-modal");
});

$("#cancelDelete").on("click", () => {
    closeModal("delete-modal");
    $("#none").html("");
});
