<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $tasks = new Tasks($db);
    
    $task_name = $_POST["task_name"];
    $task_low = $_POST["task_low"];
    $task_high = $_POST["task_high"];
    $task_description = $_POST["task_description"];
    $task_id = $_POST["task_id"];

    if ($task_low > $task_high) {
        $response = [
            "query_status" => "ERR_UPDATING_TASK_TIME"
        ];
        echo json_encode($response);
    } else {
        $tasks->task_name = $task_name;
        $tasks->task_low = $task_low;
        $tasks->task_high = $task_high;
        $tasks->task_description = $task_description;
        $tasks->task_id = $task_id;

        $response = $tasks->updateTask();

        $response = [
            "query_status" => $response,
            "task_id" => $task_id
        ];
        
        echo json_encode($response);
    }

    exit;
?>