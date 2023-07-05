<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test</h1>

    <hr>
    <hr>

    <?php
        $current_directory = dirname(__FILE__);
        $relative_directory = "../../";

        require $current_directory . "/../../parts/header.php";
        require $current_directory . "/../../classes/Info.php";


        $sprint_start_date = new DateTime("January 2023");
        $start_date_string = $sprint_start_date->format("Y-m-d");

        $end_date = clone $sprint_start_date;
        $end_date->modify("last day of this month");
        $end_date_string = $end_date->format("Y-m-d");

        echo "Start Date: " . $start_date_string;
        echo "End Date: " . $end_date_string;
    ?>

    <hr>
    <hr>

    <h1>getDatesThisWeek</h1>
    <div>
    <?php
        $week_dates = getDatesThisWeek();
        print_r($week_dates);
    ?>
    </div>

    <hr>
    <hr>

    <?php
        $info = new Info($db);
        $info->sprint_id = "6";
        $info->user_id = $_SESSION["user"]["id"];

        $response = $info->timeRegisteredThisSprint();
        
        echo "<pre>";
        var_dump($response);
        echo "</pre>";
    ?>

    <hr>
    <hr>
    <?php
        $info_days = new Info($db);
        $info_days->sprint_id = "6";

        $response_info_days = $info->totalTimeThisSprint();
        echo "<pre>";
            var_dump($response_info_days);
        echo "</pre>";
    ?>
</body>
</html>