let closeToastButton = document.getElementById("created-toast");
let toast = document.getElementById("success-toast");

toast.addEventListener("click", function () {
    toast.classList.add("fade-out-toast");

    setTimeout(() => {
        toast.classList.replace("flex", "hidden");
    }, 300);
});
