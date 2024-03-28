let button = document.querySelector("#eye-password");
let passwordField = document.getElementById("password");
let openEye = document.querySelector(".open-eye");
let closeEye = document.querySelector(".close-eye");

const checkPasswordVisibility = () => {
    if (passwordField.type !== "password") {
        passwordField.type = "password";

        closeEye.classList.add("hidden");
        openEye.classList.remove("hidden");
    } else {
        passwordField.type = "text";

        openEye.classList.add("hidden");
        closeEye.classList.remove("hidden");
    }
};

button.addEventListener("click", () => {
    checkPasswordVisibility();
});

checkPasswordVisibility();
