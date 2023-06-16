document.addEventListener("DOMContentLoaded", function(event) {
    document.addEventListener("RecentTasksCreated", function(event) {

        function RecentTasksCreated() {
            fetch("../AJAX/task/AJAX_POST_recent-tasks-created.php")
                .then(function(response) {
                    if (response.ok) {
                        return response.text();
                    } else {
                        throw new Error("Error making AJAX request: " + response.status + " " + response.statusText);
                    }
                })
                .then(function(data) {
                    document.querySelector(".RecentTasksCreated").innerHTML = data;
                })
                .catch(function(error) {
                    console.log("::: ERROR: AJAX_POST_recent-tasks-created: " + error.message);
                });
        }
        setTimeout(() => {
            RecentTasksCreated();
        }, 250);
    });
});
