let loading = document.querySelector("#loading");
let content = document.getElementById("content");

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        loading.classList.replace("flex", "hidden");
        content.classList.remove("hidden");
    }, 2000);
});
