<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $tasks = new Tasks($db);
    
    $task_register_time = $_POST["task_register_time"];
    $task_register_time_date = $_POST["task_register_time_date"];
    $task_registration_type = $_POST["registration_type"];
    $task_id = $_POST["task_id"];
    $person_id = $_SESSION["user"]["id"];
    $time_registration_note = "";

    if ($task_register_time > 0) {
        $tasks->time_registration_amount = $task_register_time;
        $tasks->time_registration_date = $task_register_time_date;
        $tasks->task_id = $task_id;
        $tasks->person_id = $person_id;
        $tasks->time_registration_note = $time_registration_note;
        $tasks->task_registration_type = $task_registration_type;

        $response = $tasks->taskTimeRegistration();

        $response = [
            "query_status" => $response,
            "task_id" => $task_id
        ];

        echo json_encode($response);
    }

    exit;
?>