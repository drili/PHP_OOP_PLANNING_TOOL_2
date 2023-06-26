<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Persons.php";

    $requestBody = file_get_contents('php://input');
    $data = json_decode($requestBody, true);
    
    $task_id = $data["dataTaskId"];
    $person_id = $data["personId"];

    $person_assign = new Persons($db);
    $person_assign->task_id = $task_id;
    $person_assign->person_id = $person_id;

    $response = $person_assign->assignTaskPerson();

    $response = [
        "query_status" => $response
    ];

    echo json_encode($response);
    exit;
?>