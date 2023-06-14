document.addEventListener("DOMContentLoaded", function() {
    const darkModeSwitch = document.getElementById("darkModeSwitch");

    // const prefersDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
    // darkModeSwitch.checked = prefersDarkMode;
    
    darkModeSwitch.addEventListener("change", function () {
        if (this.checked) {
            document.body.classList.add("dark-mode");
            darkModeSwitch.classList.add("checked-input");
            darkModeSwitch.checked = true;
            ajaxSaveDarkmodePreference(1);
        } else {
            document.body.classList.remove("dark-mode");
            darkModeSwitch.classList.remove("checked-input");
            darkModeSwitch.checked = false;
            ajaxSaveDarkmodePreference(0);
        }
    });

    function ajaxSaveDarkmodePreference(darkmode) {
        fetch("../AJAX/user/AJAX_POST_darkmode.php", {
            method: "POST",
            body: JSON.stringify({ darkmode }),
        })
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Error making AJAX request: " + response.status + " " + response.statusText);
                }
            })
            .then(function(response) {
                console.log({ response });
            })
            .catch(function(error) {
                console.log("::: ERROR: topbar.js: " + error.message);
            })
    }
})