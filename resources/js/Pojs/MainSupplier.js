import { Modal } from "flowbite";

export {
    storeSupplier,
    openSuccessModal,
    closeSuccessModal,
    openModal,
    closeModal,
    closedelete,
    openDeleteModal,
    editSupplier,
    showedit,
};

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

function openSuccessModal() {
    const $targetEl = document.getElementById("static-modal");
    const modal = new Modal($targetEl);
    modal.show();
}

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

function closeSuccessModal() {
    const $targetEl = document.getElementById("static-modal");
    const modal = new Modal($targetEl);
    modal.hide();
    document.querySelector("body > div[modal-backdrop]")?.remove();
}

function closeForm() {
    const $a = document.getElementById("form-modal");
    const m = new Modal($a);
    m.hide();
}

function closedelete() {
    const $b = document.getElementById("delete-modal");
    const d = new Modal($b);
    d.hide();
}

function closeedit() {
    const $ed = document.getElementById("edit-modal");
    const med = new Modal($ed);
    med.hide();
}

function showedit() {
    const $ed = document.getElementById("edit-modal");
    const med = new Modal($ed);
    med.show();
}

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
                closeForm();
                $("#storeSupplier").find("span").text("");
                $("#storeSupplier")[0].reset();
                openSuccessModal();

                setTimeout(function () {
                    $.get(location.href, function (data) {
                        var supplierContent = $(data)
                            .find("#supplierContainer")
                            .html();
                        $("#supplierContainer").html(supplierContent);
                    });
                }, 1000);
            } else if (result.status == "error") {
                $("#storeSupplier").find("span").text("");
                $.each(result.errors, function (key, value) {
                    var showerror = $(document).find("#" + key + "_error");
                    showerror.html(value);
                });
            }
        },
        error: (error) => {
            console.log(error.responseText);
        },
    });
}

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
                setTimeout(location.reload(true), 1000); //reloadpage if success
            } else if (result.status == "error") {
                $("#storeSupplier").find("span").text("");
                $.each(result.errors, function (key, value) {
                    var showerror = $(document).find("#" + key + "_error");
                    showerror.html(value);
                });
            }
        },
        error: (error) => {
            console.log(error.responseText);
        },
    });
}

$("#open-form").on("click", () => {
    openModal("form-modal");
});

$("#close-form").on("click", () => {
    closeModal("form-modal");
});

$("#close-s-Modal").on("click", () => {
    closeModal("static-modal");
});

$("#edit-close-form").on("click", () => {
    closeedit();
});
