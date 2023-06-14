<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";

    $response = array();
    $data = json_decode(file_get_contents('php://input'), true);

    $darkmode = $data['darkmode'];

    $darkmode_res = $user->updateDarkModePreference($_SESSION["user"]["id"], $darkmode);

    if ($darkmode_res === "SUCCESS_DARKMODE") {
        $response['response_status'] = "SUCCESS_DARKMODE";
    } else {
        $response['response_status'] = "ERROR_DARKMODE";
    }

    echo json_encode($response);
    exit;