<?php
    function AuthControllerLogin($project_directory) {

        $current_url = $_SERVER["REQUEST_URI"];
        if (strpos($current_url, "/logout.php") !== false) {
            return;
        }

        if (isset($_SESSION['user']["logged_in"]) && $_SESSION['user']["logged_in"] === "LOGGED_IN") {
            if (strpos($current_url, "/views/") !== false) {
                // ...
            } else {
                header("Location: ". $project_directory ."/views/dashboard.php");
            }
        } else {
            if (strpos($current_url, "/views/") !== false && $_SESSION['user']["logged_in"] !== "LOGGED_IN") {
                header("Location: ". $project_directory ."/index.php");
            }
        }
    }

    function AuthControllerActivated($project_directory, $activation_id) {
        $current_url = $_SERVER["REQUEST_URI"];
        if (isset($_SESSION['user']["logged_in"]) && $_SESSION['user']["logged_in"] === "LOGGED_IN") {
            if ($activation_id === "0") {
                if (strpos($current_url, "user-activation.php") !== false) {
                    return;
                } else {
                    header("Location: ". $project_directory ."/views/user-activation.php");
                }
            } else {
                if (strpos($current_url, "user-activation.php") !== false) {
                    header("Location: ". $project_directory ."/views/dashboard.php");
                }
            }
        } else {
            if (strpos($current_url, "/views/") !== false && $_SESSION['user']["logged_in"] !== "LOGGED_IN") {
                header("Location: ". $project_directory ."/views/user-activation.php");
            }
        }
        echo "<script>console.log('activation_id: ". $activation_id ."')</script>";
    }