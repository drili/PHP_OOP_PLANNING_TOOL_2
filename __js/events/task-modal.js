document.addEventListener("DOMContentLoaded", function(event) {
    document.addEventListener("TaskModal", function(event) {
        // *** Fetch Modal
        $(".modal").remove();

        var dataTaskId = event.detail.dataTaskId;

        if (dataTaskId) {
            const htmlModal = document.createElement("div");
            htmlModal.id = "dataTask" + dataTaskId;
            htmlModal.classList.add("modal");
            const bodyElement = document.body;

            bodyElement.appendChild(htmlModal);

            $('.modal').modal({
                fadeDuration: 250
            }, ajaxFetchTask(dataTaskId));

            function ajaxFetchTask(dataTaskId) {
                fetch("../AJAX/task/AJAX_POST_modal-task.php", {
                    method: "POST",
                    body: JSON.stringify({ dataTaskId: dataTaskId })
                }) 
                    .then(function(response) {
                        if (response.ok) {
                            return response.text();
                        } else {
                            throw new Error("Error making AJAX request: " + response.status + " " + response.statusText);
                        }
                    })
                    .then(function(data) {
                        document.querySelector(".modal").innerHTML = data;
                        document.getElementById('datepicker').valueAsDate = new Date();

                        var quill = new Quill('.quill-text-area-modal', {
                            theme: 'snow'
                        });

                        accordionTitle();
                        formUpdateTask();
                        formTaskRegisterTime();
                        updateTaskSprint();
                    })
                    .catch(function(error) {
                        console.log("::: ERROR: AJAX_POST_recent-tasks-created: " + error.message);
                    });
            }
        }

        // *** Functions: Update Task
        function formUpdateTask() {
            const updateForm = document.querySelector("#FormUpdateTask");
    
            updateForm.addEventListener("submit", function(e) {
                e.preventDefault();
    
                const updateFormData = new FormData(updateForm);
                const taskDescription = document.querySelector("#FormUpdateTask .ql-editor").innerHTML;
    
                updateFormData.append("task_description", taskDescription);
    
                fetch("../AJAX/task/AJAX_POST_update-task.php", {
                    method: "POST",
                    body: updateFormData
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error("Error making AJAX request: " + response.status + " " + response.statusText);
                    }
                })
                .then(function(data) {
                    if(data.query_status === "SUCCESS_TASK_UPDATED") {
                        var taskModalEventData = new CustomEvent("TaskModal", {
                            "detail": {
                                "dataTaskId": data.task_id
                            }
                        });
                        document.dispatchEvent(taskModalEventData);

                        var event__RecentTasksCreated = new Event("RecentTasksCreated");
                        document.dispatchEvent(event__RecentTasksCreated);

                        toastMessageSuccess("Success!", "Task has been updated successfully");
                    } else if (data.query_status === "ERR_UPDATING_TASK_TIME") {
                        toastMessageError("Error!", "Task low cannot be higher than task high");
                    } else {
                        toastMessageError("Error!", "There was an error updating the task");
                    }
                })
                .catch(function(error) {
                    console.log("::: ERROR: AJAX_POST_update-task: " + error.message);
                });
            })
        }

        // *** Functions: Update Task
        function formTaskRegisterTime() {
            const registerTimeForm = document.querySelector("#RegisterTaskTime");

            registerTimeForm.addEventListener("submit", function(e) {
                e.preventDefault();

                const registerFormData = new FormData(registerTimeForm);

                fetch("../AJAX/task/AJAX_POST_register-task-time.php", {
                    method: "POST",
                    body: registerFormData
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error("Error making AJAX request: " + response.status + " " + response.statusText);
                    }
                })
                .then(function(data) {
                    if (data.query_status === "SUCCESS_TIME_REGISTRATION") {
                        var taskModalEventData = new CustomEvent("TaskModal", {
                            "detail": {
                                "dataTaskId": data.task_id
                            }
                        });
                        document.dispatchEvent(taskModalEventData);

                        toastMessageSuccess("Success!", "Time has been registered successfully");
                    } else {
                        toastMessageError("Error!", "There was an error registering your time registration");
                    }
                })
                .catch(function(error) {
                    console.log("::: ERROR: AJAX_POST_register-task-time: " + error.message);
                });
            })
        }
        
        function updateTaskSprint() {
            const formMoveTaskSprint = document.querySelector("#MoveTaskSprint");

            formMoveTaskSprint.addEventListener("submit", function(e) {
                e.preventDefault();

                const formData = new FormData(formMoveTaskSprint);

                fetch("../AJAX/task/AJAX_POST_update-task-sprint.php", {
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
                    if (data.query_status === "SUCCESS_TASK_UPDATED") {
                        var taskModalEventData = new CustomEvent("TaskModal", {
                            "detail": {
                                "dataTaskId": data.task_id
                            }
                        });
                        document.dispatchEvent(taskModalEventData);

                        toastMessageSuccess("Success!", "Task has been moved to a new sprint");
                    } else {
                        toastMessageError("Error!", "There was an error moving this task to another sprint");
                    }
                })
                .catch(function(error) {
                    console.log("::: ERROR: AJAX_POST_update-task-sprint: " + error.message);
                });
            })
        }

    });
});