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

        public function totalAllocatedTimeThisSprint() {
            $sprint_id = mysqli_real_escape_string($this->db->conn, $this->sprint_id);
            $user_id = mysqli_real_escape_string($this->db->conn, $this->user_id);

            $query = "SELECT SUM(tasks.task_low + tasks.task_high) / 2 AS task_median
            FROM tasks
            LEFT JOIN tasks_persons ON tasks.task_id = tasks_persons.task_id
            WHERE tasks.sprint_id = $sprint_id AND tasks_persons.person_id = $user_id";
            $query_res = $this->db->conn->query($query);

            if ($query_res->num_rows > 0) {
                return $query_res->fetch_assoc();
            } else {
                return "0";
            }
        }

        public function userFinishedTasks() {
            $user_id = mysqli_real_escape_string($this->db->conn, $this->user_id);

            $query = "SELECT tasks_persons.*,
            tasks.*
            FROM tasks_persons
            LEFT JOIN tasks ON tasks.task_id = tasks_persons.task_id
            WHERE tasks_persons.person_id = $user_id";
            $query_res = $this->db->conn->query($query);

            if ($query_res->num_rows > 0) {
                $res_array = [];
                while ($row = $query_res->fetch_assoc()) {
                    $res_array[] = $row;
                }

                return $res_array;
            } else {
                return "0";
            }
        }

        public function userTimeRegistrationsCount() {
            $user_id = mysqli_real_escape_string($this->db->conn, $this->user_id);
            $sprint_id = mysqli_real_escape_string($this->db->conn, $this->sprint_id);

            $query_sprint = "SELECT * FROM sprints WHERE sprint_id = $sprint_id";
            $query_sprint_res = $this->db->conn->query($query_sprint);

            while ($row = $query_sprint_res->fetch_assoc()) {
                $start_date_string = $this->sprintStartDate($row["sprint_name"]);
                $end_date_string = $this->sprintEndDate($row["sprint_name"]);
            }

            $query = "SELECT * FROM time_registrations 
            WHERE person_id = $user_id
            AND time_registration_date BETWEEN '$start_date_string' AND '$end_date_string'";
            $query_res = $this->db->conn->query($query);

            if($query_res->num_rows > 0) {
                return $query_res->num_rows;
            } else {
                return "0";
            }
        }

        public function teamTimeRegistrations() {
            $sprint_id = mysqli_real_escape_string($this->db->conn, $this->sprint_id);

            $query_sprint = "SELECT * FROM sprints WHERE sprint_id = $sprint_id";
            $query_sprint_res = $this->db->conn->query($query_sprint);

            while ($row = $query_sprint_res->fetch_assoc()) {
                $start_date_string = $this->sprintStartDate($row["sprint_name"]);
                $end_date_string = $this->sprintEndDate($row["sprint_name"]);
            }

            $query = "SELECT
                users.id,
                users.username,
                users.profile_image,
                SUM(CASE WHEN time_registrations.registration_type = 'client' THEN time_registrations.time_registration_amount ELSE 0 END) AS sum_client_time,
                SUM(CASE WHEN time_registrations.registration_type = 'internal' THEN time_registrations.time_registration_amount ELSE 0 END) AS sum_internal_time,
                SUM(CASE WHEN time_registrations.registration_type = 'off_time' THEN time_registrations.time_registration_amount ELSE 0 END) AS sum_offtime_time,
                SUM(CASE WHEN time_registrations.registration_type = 'sick_time' THEN time_registrations.time_registration_amount ELSE 0 END) AS sum_sicktime_time,
                SUM(time_registrations.time_registration_amount) AS sum_total
            FROM
                users
            LEFT JOIN
                time_registrations ON time_registrations.person_id = users.id
                AND time_registrations.time_registration_date BETWEEN '$start_date_string' AND '$end_date_string'
            GROUP BY
                users.id;
            ";
            $query_res = $this->db->conn->query($query);

            if ($query_res->num_rows > 0) {
                $result_array = mysqli_fetch_all($query_res, MYSQLI_ASSOC);
                return [
                    "result" => $result_array,
                    "error_msg" => null
                ];
            } else {
                return [
                    "result" => null,
                    "error_msg" => "ERROR_TEAM_TIME_EFFORTS",
                    "error" => mysqli_error($this->db->conn)
                ];
            }
        }
    }