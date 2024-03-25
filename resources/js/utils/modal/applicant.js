// * MODAL CSS PROPERTIES
// .modal-active {
//     @apply bg-black/20 visible duration-75 ease-out;
// }
// .modal-inactive {
//     @apply transition-colors invisible;
// }
// .modal-content {
//     @apply rounded-xl bg-white duration-200 shadow p-6 transition-all;
// }
// .fade-in-modal {
//     @apply translate-y-0 opacity-100 ease-in;
// }
// .fade-out-modal {
//     @apply translate-y-4 opacity-0 ease-out;
// }

let deleteButtons = document.querySelectorAll(".modal-open-button");
let backgroundModals = document.querySelectorAll(".modal-applicant-background");
let modalContents = document.querySelectorAll(".modal-content");
let closeModalButtons = document.querySelectorAll(".modal-close-button");

let currentModalIndex = -1;
document.addEventListener("DOMContentLoaded", function () {
    deleteButtons.forEach((button, buttonIndex) => {
        button.addEventListener("click", function (e) {
            e.stopPropagation();
            currentModalIndex = buttonIndex;
            backgroundModals.forEach((modal, modalIndex) => {
                if (buttonIndex === modalIndex) {
                    backgroundModals[modalIndex].classList.replace(
                        "modal-inactive",
                        "modal-active"
                    );
                    modalContents[modalIndex].classList.replace(
                        "fade-out-modal",
                        "fade-in-modal"
                    );
                }
            });
        });
    });

    closeModalButtons.forEach((closeButton, index) => {
        closeButton.addEventListener("click", function (e) {
            e.stopPropagation();
            if (index === currentModalIndex) {
                backgroundModals[currentModalIndex].classList.replace(
                    "modal-active",
                    "modal-inactive"
                );
                modalContents[currentModalIndex].classList.replace(
                    "fade-in-modal",
                    "fade-out-modal"
                );
            }
        });
    });
});
