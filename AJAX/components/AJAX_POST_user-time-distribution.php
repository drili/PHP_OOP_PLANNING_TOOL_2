<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Persons.php";
    require $current_directory . "/" . "../../classes/Info.php";

    $requestBody = file_get_contents('php://input');
    $data = json_decode($requestBody, true);
    
    $person_id = $_SESSION["user"]["id"];
    $sprint_id = $data['sprint_id'];

    $user_info = new Info($db);
    $user_info->user_id = $person_id;
    $user_info->sprint_id = $sprint_id;
    $user_info_arr = $user_info->teamTimeRegistrationsUser();
    
    echo json_encode($user_info_arr);
?>
