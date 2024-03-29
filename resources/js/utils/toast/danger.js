let closeToastButton = document.getElementById("deleted-toast");
let toast = document.getElementById("danger-toast");

toast.addEventListener("click", function () {
    toast.classList.add("fade-out-toast");

    setTimeout(() => {
        toast.classList.replace("flex", "hidden");
    }, 300);
});
