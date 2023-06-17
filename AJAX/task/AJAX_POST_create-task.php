<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $tasks = new Tasks($db);
    
    $user_id = $_SESSION["user"]["id"];
    $task_name = $_POST["task_name"];
    $task_low = $_POST["task_low"];
    $task_high = $_POST["task_high"];
    $task_description = $_POST["task_description"];
    $task_customer = $_POST["customer"];
    $task_label = $_POST["task_label"];
    $task_vertical = $_POST["task_vertical"];
    $sprints_id_arr = $_POST["task_sprints"];
    $persons_id_arr = $_POST["task_persons"];
    
    if ($task_low > $task_high) {
        $response = [
            "query_status" => "ERR_CREATING_TASK_TIME"
        ];
        echo json_encode($response);
    } else {
        $tasks->task_name = $task_name;
        $tasks->task_low = $task_low;
        $tasks->task_high = $task_high;
        $tasks->task_description = $task_description;
        $tasks->sprint_id = $sprints_id_arr;
        $tasks->customer_id = $task_customer;
        $tasks->label_id = $task_label;
        $tasks->user_id = $user_id;
        $tasks->task_persons = $persons_id_arr;
        $tasks->task_vertical_id = $task_vertical;

        $response = $tasks->createTask();

        $response = [
            "query_status" => $response
        ];
        
        echo json_encode($response);

    }
    exit;
?>