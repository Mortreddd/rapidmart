import { Modal } from "flowbite";

export { openSuccessModal, closeModal };
// set the modal menu element
const $targetEl = document.getElementById("static-modal");

// const options = {
//     placement: "bottom-right",
//     backdrop: "dynamic",
//     backdropClasses: "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
//     closable: true,
//     onHide: () => {
//         console.log("modal is hidden");
//     },
//     onShow: () => {
//         console.log("modal is shown");
//     },
// };

// // instance options object
// const instanceOptions = {
//     id: "static-modal",
//     override: true,
// };
// options with default values
const modal = new Modal($targetEl);

function openSuccessModal() {
    modal.show();
}

function closeModal() {
    modal.hide();
    document.querySelector("body > div[modal-backdrop]")?.remove();
}
