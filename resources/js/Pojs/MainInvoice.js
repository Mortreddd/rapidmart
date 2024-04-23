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
        onHide: () => {
            console.log("modal is hidden");
        },
        onShow: () => {
            console.log("modal is shown");
        },
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
        onHide: () => {
            console.log("modal is hidden");
        },
        onShow: () => {
            console.log("modal is shown");
        },
    };

    const openModal = new Modal($myEl, o);
    openModal.hide();
}

$("#cancelapprove").on("click", function () {
    closeModal("approve-modal");
});
