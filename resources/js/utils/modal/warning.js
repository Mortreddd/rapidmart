const clearAllButton = document.getElementById("clear-all-button");
let modalBackground = document.getElementById("danger-modal");
let modalContent = document.getElementById("danger-modal-content");
let closeModalButton = document.getElementById("close-modal-button");
let cancelModalButton = document.getElementById("cancel-modal-button");
let exButton = document.getElementById("x-modal-button");
let isOpen = false;

clearAllButton.addEventListener("click", () => {
    checkModal();
});

cancelModalButton.addEventListener("click", () => {
    checkModal();
});
closeModalButton.addEventListener("click", () => {
    checkModal();
});

modalContent.addEventListener("click", (e) => {
    e.stopPropagation();
});

function checkModal() {
    isOpen = !isOpen;
    if (isOpen) {
        modalBackground.classList.replace("modal-inactive", "modal-active");
        modalContent.classList.replace("fade-out-modal", "fade-in-modal");
    } else {
        modalBackground.classList.replace("modal-active", "modal-inactive");
        modalContent.classList.replace("fade-in-modal", "fade-out-modal");
    }
}
