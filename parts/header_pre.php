<?php
    // *** Pre-requisites
    $root_directory = $_SERVER['DOCUMENT_ROOT'] . "/PROJECTS_2023\PHP_OOP_PLANNING_TOOL_2";
    $project_directory = "/PROJECTS_2023\PHP_OOP_PROJECT_1";

    // *** Global functions
    require $root_directory . "/functions/global_functions.php";

    // *** Composer requires
    require $root_directory . '/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable($root_directory);
    $dotenv->load();

    // *** Init Database connection
    $hostname = $_ENV["HOSTNAME"];
    $username = $_ENV["USERNAME"];
    $password = $_ENV["PASSWORD"];
    $database = $_ENV["DATABASE"];

    // TODO: Init database connection
    // require $root_directory . "/lib/DBConnection.php";
    // $db = new DBConnection($hostname, $username, $password, $database);
?>