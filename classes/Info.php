<?php
    class Info {
        private $db;
        public $sprint_name;

        public function __construct($db) {
            $this->db = $db;
        }

        public function sprintStartDate($sprint_name) {
            $sprint_start_date = new DateTime($sprint_name);
            $start_date_string = $sprint_start_date->format("Y-m-d");

            return $start_date_string;
        }

        public function sprintEndDate($sprint_name) {
            $end_date = new DateTime($sprint_name);

            $end_date->modify("last day of this month");
            $end_date_string = $end_date->format("Y-m-d");
            return $end_date_string;
        }

        public function timeRegisteredThisSprint() {
            $sprint_id = mysqli_real_escape_string($this->db->conn, $this->sprint_id);
            $user_id = mysqli_real_escape_string($this->db->conn, $this->user_id);

            $query_sprint = "SELECT * FROM sprints WHERE sprint_id = $sprint_id";
            $query_sprint_res = $this->db->conn->query($query_sprint);

            while ($row = $query_sprint_res->fetch_assoc()) {
                $start_date_string = $this->sprintStartDate($row["sprint_name"]);
                $end_date_string = $this->sprintEndDate($row["sprint_name"]);
            }

            $query = "SELECT SUM(time_registration_amount) as tr_amount,
            person_id as tr_person_id 
            FROM time_registrations 
            WHERE time_registration_date BETWEEN '$start_date_string' AND '$end_date_string' 
            AND person_id = $user_id";
            $query_res = $this->db->conn->query($query);

            if ($query_res->num_rows > 0) {
                $result_array = [];
                while ($row = $query_res->fetch_assoc()) {
                    $result_array[] = $row;
                }
    
                return $result_array;
            } else {
                return "0";
            }
            
        }

        public function totalTimeThisSprint() {
            $sprint_id = mysqli_real_escape_string($this->db->conn, $this->sprint_id);

            $query_sprint = "SELECT * FROM sprints WHERE sprint_id = $sprint_id";
            $query_sprint_res = $this->db->conn->query($query_sprint);

            while ($row = $query_sprint_res->fetch_assoc()) {
                $sprint_name = $row["sprint_name"];
            }

            $start_date = new DateTime($sprint_name);
            $end_date = clone $start_date;
            $end_date->modify('last day of this month');

            $current_date = $start_date;
            while ($current_date <= $end_date) {
                $dayOfWeek = $current_date->format('N');
                if ($dayOfWeek < 6) {
                    $workdays[] = $current_date->format('Y-m-d');
                }

                $current_date->modify('+1 day');
            }
            
            $total_time = abs(round(count($workdays) * 7.5 ,2));
            return $total_time;
        }
    }