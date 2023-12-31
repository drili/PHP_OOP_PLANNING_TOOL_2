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
                    const errorSection = document.querySelector(".form-message");
                    const errorResponse = response["response_status"];
                    errorSection.innerHTML = "";
                    errorSection.innerHTML = `<div class="form-error-custom"><section><p>Your username or password was incorrect, please try again.</p></section></div>`;
                }
            })
            .catch(function(error) {
                console.log("::: ERROR: login-user.js: " + error.message);
            })
    })
})