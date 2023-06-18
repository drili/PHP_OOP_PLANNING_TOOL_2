(function() {
    var isEventListenerAdded = false;

    function clearForm() {
        const formClear = document.getElementById("FormCreateTask");
        const formElements = formClear.elements;

        for (let i = 0; i < formElements.length; i++) {
            const formElement = formElements[i];

            if (formElement.tagName === 'INPUT' || formElement.tagName === 'SELECT' || formElement.tagName === 'TEXTAREA') {
                formElement.value = '';
            }
        }

        const qlEditor = document.querySelector(".ql-editor");
        qlEditor.innerHTML = "";

        const multiSelect = $('.js-example-basic-multiple');
        multiSelect.val(null).trigger('change');
    }
    document.addEventListener("CreateTask", function(event) {
        if (isEventListenerAdded) {
            return;
        }

        const clickValue = event.detail.value;

        const form = document.getElementById("FormCreateTask");

        function handleFormSubmit(event) {
            event.preventDefault();

            const formData = new FormData(form);
            const taskDescription = document.querySelector(".ql-editor").innerHTML; 

            formData.append("task_description", taskDescription);

            fetch("../AJAX/task/AJAX_POST_create-task.php", {
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
            .then(function(data) {
                console.log({ data });
                if (data.query_status === "SUCCESS_TASK_CREATED") {
                    toastMessageSuccess("Success!", "Task has been created successfully");
                    var event__RecentTasksCreated = new Event("RecentTasksCreated");
                    document.dispatchEvent(event__RecentTasksCreated);

                    if (clickValue == "btn-create-task") {
                        clearForm();
                    }
                } else if (data.query_status === "ERR_CREATING_TASK_TIME") {
                    toastMessageError("Error!", "Task low cannot be higher than task high");
                } else {
                    toastMessageError("Error!", "There was an error creating task");
                }
            })
            .catch(function(error) {
                console.log("::: ERROR: AJAX_POST_create-task: " + error.message);
            });
        }

        form.removeEventListener("submit", handleFormSubmit);
        form.addEventListener("submit", handleFormSubmit);

        isEventListenerAdded = true;
    });
})();