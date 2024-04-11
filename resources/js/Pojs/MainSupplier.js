import { Modal } from "flowbite";

export { hello, openSuccessModal, closeSuccessModal, openModal, closeModal };

// for <script></script>
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
    const openModal = new Modal($myEl);
    openModal.hide();
    document.querySelector("body > div[modal-backdrop]")?.remove();
}

// end

const $targetEl = document.getElementById("static-modal");
const modal = new Modal($targetEl);

function openSuccessModal() {
    modal.show();
}

function closeSuccessModal() {
    //This is for the modal since the flowbite had a bug with backdrop
    //solution link :: https://stackoverflow.com/questions/77071906/flowbite-modal-backdrop-not-hide-when-close-with-function
    modal.hide();
    document.querySelector("body > div[modal-backdrop]")?.remove();
}


function closeForm(){
    const $a = document.getElementById("form-modal");
    const m = new Modal($a);
    m.hide()
}

function hello(url,formData) {
    // AJAX request
    $.ajax({
        url: url,
        data: formData,
        type: "POST",
        contentType: false,
        processData: false,
        beforeSend: () => {
            $("saveSupplier").prop("disabled", true);
        },
        complete: () => {
            $("saveSupplier").prop("disabled", false);

        },
        success: (result) => {
            if (result.status == "success") {
                closeForm();
            $("#storeSupplier").find("span").text("");
            $("#storeSupplier")[0].reset();
            openSuccessModal();
                console.log(result);
            } else if (result.status == "error") {
                $.each(result.errors, function (key, value) {
                    var showerror = $(document).find("#" + key + "_error");
                    showerror.html(value);
                });
            }
        },
        error: (error) => {
            console.log(error);
        },
    });
}
