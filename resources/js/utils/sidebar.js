let button = document.getElementById("burger-button");
let sidebar = document.getElementById("sidebar");
let bars = [
    document.querySelector(".bar1"),
    document.querySelector(".bar2"),
    document.querySelector(".bar3"),
];
let isOpen = false;

button.addEventListener("click", function () {
    isOpen = !isOpen;
    bars.forEach((bar) => {
        bar.classList.toggle("change", isOpen);
    });
    button.classList.toggle("change", isOpen);

    if (isOpen) {
        sidebar.classList.replace("grid-template-col-0", "grid-template-col-1");
    } else {
        sidebar.classList.replace("grid-template-col-1", "grid-template-col-0");
    }
});
