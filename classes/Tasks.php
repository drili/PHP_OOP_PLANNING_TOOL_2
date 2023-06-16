<?php
    class Tasks {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function createTask() {

        }

        public function updateTask() {

        }

        public function deleteTask() {

        }

        public function fetchTask() {
            
        }

        public function fetchLatestTasksByUser($user_id) {
            $query = "SELECT * FROM tasks WHERE created_by = '".$user_id."' ORDER BY task_id DESC LIMIT 5";
            $query_res = $this->db->conn->query($query);

            if ($query_res->num_rows > 0) {
                $tasks_by_user_array = array();
                while ($row = $query_res->fetch_assoc()) {
                    $tasks_by_user_array[] = $row;
                }

                return $tasks_by_user_array;
            } else {
                return "ERR_FETCHING_TASKS_BY_USER";
            }
        }
    }