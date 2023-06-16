document.addEventListener("DOMContentLoaded", function(event) {
    document.addEventListener("RecentTasksCreated", function(event) {
        function RecentTasksCreated() {
            console.log(`RecentTasksCreated();`);
    
            fetch("../AJAX/task/AJAX_POST_recent-tasks-created.php", {
                method: "POST",
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
                    var elementRecentTasksCreated = document.querySelector(".RecentTasksCreated");
                    elementRecentTasksCreated.innerHTML = response;
                })
                .catch(function(error) {
                    console.log("::: ERROR: AJAX_POST_recent-tasks-created: " + error.message);
                })
        }
        RecentTasksCreated();
    });
});
