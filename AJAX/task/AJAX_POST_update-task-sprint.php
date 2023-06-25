<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $task_id = $_POST["task_id"];
    $sprint_id = $_POST["sprint_id"];

    $tasks = new Tasks($db);
    $tasks->sprint_id = $sprint_id;
    $tasks->task_id = $task_id;

    $response = $tasks->updateTaskSprint();

    $response = [
        "query_status" => $response,
        "task_id" => $task_id
    ];

    echo json_encode($response);
    
    exit;
?>