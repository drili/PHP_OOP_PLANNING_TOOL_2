<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Persons.php";
    
    $person_id = $_SESSION["user"]["id"];

    function getDatesThisWeekAJAX() {
        $curent_date = new DateTime();
        $curent_date->setISODate($curent_date->format('Y'), $curent_date->format('W'));
        
        $dates = array();
        for ($i = 1; $i <= 7; $i++) {
            $date = $curent_date->format('Y-m-d');
            $dates[] = $date;
            $curent_date->modify('+1 day');
        }
        
        return $dates;
    }
    
    $week_dates = getDatesThisWeekAJAX();
    $time_regs = [];

    foreach ($week_dates as $week) {
        $query = "SELECT * FROM time_registrations WHERE time_registration_date = '$week' AND person_id = $person_id";
        $query_res = $db->conn->query($query);

        if (mysqli_num_rows($query_res) > 0) {
            while ($row = mysqli_fetch_assoc($query_res)) {
                $time_regs[] = $row;
            }
        } else {
            $time_regs[] = 0;
        }
    }

    $json_data = [
        "week_dates" => $week_dates,
        "time_regs" => $time_regs
    ];
    echo json_encode($json_data);
?>
