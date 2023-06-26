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

    $person_unassign = new Persons($db);
    $person_unassign->task_id = $task_id;
    $person_unassign->person_id = $person_id;
    
    $response = $person_unassign->unAssignTaskPerson();

    $response = [
        "query_status" => $response
    ];

    echo json_encode($response);

    exit;
?>