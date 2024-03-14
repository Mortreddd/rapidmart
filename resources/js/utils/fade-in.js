let form = document.querySelector("form");

document.body.onload(() => {
    form.classList.remove("not-loaded");
    form.classList.add("loaded");
});
