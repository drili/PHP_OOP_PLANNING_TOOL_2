<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";

    $response = "HELLO RESPONSE AJAX_POST_recent-tasks-created";

    // header('Content-Type: application/json');
    echo json_encode($response);

    exit;