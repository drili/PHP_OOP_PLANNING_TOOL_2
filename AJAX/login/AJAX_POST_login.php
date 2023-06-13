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

    $login_res = $user->login($email, $password);

    $response = array();

    if ($login_res === "SUCCESS_LOGIN") {
        $response['response_status'] = "SUCCESS_LOGIN";
    } else {
        $response['response_status'] = "ERROR_LOGIN";
    }

    // header('Content-Type: application/json');
    echo json_encode($response);

    exit;