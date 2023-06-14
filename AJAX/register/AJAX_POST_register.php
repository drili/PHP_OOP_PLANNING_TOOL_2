<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";

    // $email = mysqli_real_escape_string($db->conn, $_POST['email']);
    // $password = mysqli_real_escape_string($db->conn, $_POST['password']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST["username"];

    $register_res = $user->register($username, $email, $password);

    $response = array();

    if ($register_res === "SUCCESS_USER_CREATED") {
        $response['response_status'] = "SUCCESS_USER_CREATED";
    } else {
        $response['response_status'] = "ERROR_USER_CREATED";
    }

    // header('Content-Type: application/json');
    echo json_encode($response);

    exit;