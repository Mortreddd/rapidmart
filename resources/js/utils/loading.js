let loading = document.getElementById("loading");
let content = document.getElementById("content");

document.onreadystatechange = () => {
    if (document.readyState === "complete") {
        clearInterval(stateCheck);
        loading.classList.replace("flex", "hidden");
        content.classList.replace("hidden", "flex");
    }
};
