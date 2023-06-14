const darkModeSwitch = document.getElementById("darkModeSwitch");

const prefersDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;

darkModeSwitch.checked = prefersDarkMode;

darkModeSwitch.addEventListener("change", function () {
    if (this.checked) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }
});
