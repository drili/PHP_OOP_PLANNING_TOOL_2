document.addEventListener("DOMContentLoaded", function(event) {
    document.addEventListener("TaskModal", function(event) {
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

                        var quill = new Quill('.quill-text-area-modal', {
                            theme: 'snow'
                        });

                        accordionTitle();
                    })
                    .catch(function(error) {
                        console.log("::: ERROR: AJAX_POST_recent-tasks-created: " + error.message);
                    });
            }
        }
    });
});