document.addEventListener("DOMContentLoaded", function() {
    const registerForm = document.getElementById("registerForm");

    registerForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(registerForm);

        fetch("AJAX/register/AJAX_POST_register.php", {
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
                const errorSection = document.querySelector(".form-message");

                if (response["response_status"] === "SUCCESS_USER_CREATED") {
                    errorSection.innerHTML = "";
                    errorSection.innerHTML = `<div class="form-success-custom"><section><p>Your account has now been created successfully!</p></section></div>`;
                } else {
                    errorSection.innerHTML = "";
                    errorSection.innerHTML = `<div class="form-error-custom"><section><p>There was an error creating your account, please try again.</p></section></div>`;
                }
            })
            .catch(function(error) {
                console.log("::: ERROR: login-user.js: " + error.message);
            })
    })
})