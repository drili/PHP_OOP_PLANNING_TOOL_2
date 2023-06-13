document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(loginForm);

        fetch("AJAX/login/AJAX_POST_login.php", {
            method: "POST",
            body: formData
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

                if (response["response_status"] === "SUCCESS_LOGIN") {
                    window.location.href = "./views/dashboard.php";
                } else {
                    console.log(response["response_status"]);
                }
            })
            .catch(function(error) {
                console.log("::: ERROR: login-user.js: " + error.message);
            })
    })
})