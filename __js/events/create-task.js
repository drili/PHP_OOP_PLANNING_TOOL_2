(function() {
    var isEventListenerAdded = false;

    document.addEventListener("CreateTask", function(event) {
        if (isEventListenerAdded) {
            return;
        }

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
            })
            .catch(function(error) {
                console.log("::: ERROR: AJAX_POST_create-task: " + error.message);
            });

            // formData.forEach(function(key, value) {
            //     console.log(`key: ${key} | value: ${value}`);
            // })
        }

        form.removeEventListener("submit", handleFormSubmit);
        form.addEventListener("submit", handleFormSubmit);

        isEventListenerAdded = true;
    });
})();