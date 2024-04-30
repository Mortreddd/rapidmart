let forms = document.querySelectorAll("form");

forms.forEach((form) => {
    form.addEventListener("submit", function (e) {
        this.classList.replace("hidden", "block");
    });
});
