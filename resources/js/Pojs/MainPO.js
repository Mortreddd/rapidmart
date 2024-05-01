import { Modal } from "flowbite";

export { showModal, closeModal, openModal, closeModals, opencancelModal };

function showModal() {
    const $el = document.getElementById("popup-modal");
    const options = {
        placement: "bottom-right",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
        closable: true,
        onHide: () => {
            console.log("modal is hidden");
        },
        onShow: () => {
            console.log("modal is shown");
        },
        onToggle: () => {
            console.log("modal has been toggled");
        },
    };
    // instance options object
    const instanceOptions = {
        id: "popup-modal",
        override: true,
    };

    const confirm = new Modal($el, options, instanceOptions);

    confirm.show();
}

function openModal(el) {
    let $myEl = document.getElementById(el);
    // options with default values
    let o = {
        placement: "bottom-right",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
        closable: true,
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

function opencancelModal(el) {
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

function closeModals(id) {
    const $el = document.getElementById(id);
    const options = {
        placement: "bottom-right",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
        closable: true,
        onHide: () => {
            console.log("modal is hidden");
        },
        onShow: () => {
            console.log("modal is shown");
        },
        onToggle: () => {
            console.log("modal has been toggled");
        },
    };
    // instance options object

    const confirm = new Modal($el, options);

    confirm.hide();
}

function closeModal() {
    const $el = document.getElementById("popup-modal");
    const options = {
        placement: "bottom-right",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
        closable: true,
        onHide: () => {
            console.log("modal is hidden");
        },
        onShow: () => {
            console.log("modal is shown");
        },
        onToggle: () => {
            console.log("modal has been toggled");
        },
    };
    // instance options object
    const instanceOptions = {
        id: "popup-modal",
        override: true,
    };

    const confirm = new Modal($el, options, instanceOptions);

    confirm.hide();
}

$("#static-button").on("click", () => {
    closeSuccessModal();
});

$("#cancelremove").on("click", () => {
    closeModals("delete-modal");
});
