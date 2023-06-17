<?php
    class Tasks {
        private $db;

        public $task_name;
        public $task_low;
        public $task_high; 
        public $task_workflow_status; 
        public $task_description;
        public $sprint_id;
        public $customer_id;
        public $label_id;
        public $created_by;
        public $task_vertical_id;
        public $user_id;
        public $task_persons;


        public function __construct($db) {
            $this->db = $db;
        }

        public function createTask() {
            $task_name = mysqli_real_escape_string($this->db->conn, $this->task_name);
            $task_low = mysqli_real_escape_string($this->db->conn, $this->task_low);
            $task_high = mysqli_real_escape_string($this->db->conn, $this->task_high);
            $task_description = mysqli_real_escape_string($this->db->conn, $this->task_description);
            $customer_id = mysqli_real_escape_string($this->db->conn, $this->customer_id);
            $label_id = mysqli_real_escape_string($this->db->conn, $this->label_id);
            $task_vertical_id = mysqli_real_escape_string($this->db->conn, $this->task_vertical_id);
            $user_id = mysqli_real_escape_string($this->db->conn, $this->user_id);

            foreach ($this->sprint_id as $sprint_id) {
                $query = "INSERT INTO tasks
                (task_name, 
                task_low, 
                task_high,  
                task_description, 
                sprint_id, 
                customer_id, 
                label_id,
                task_vertical_id,
                created_by) VALUES
                ('". $task_name ."',
                '". $task_low ."',
                '". $task_high ."',
                '". $task_description ."',
                '". $sprint_id ."',
                '". $customer_id ."',
                '". $label_id ."',
                '". $task_vertical_id ."',
                '". $user_id ."')";

                $this->db->conn->query($query);

                // *** Insert task persons into "tasks_persons"
                $task_id_inserted = mysqli_insert_id($this->db->conn);
                foreach ($this->task_persons as $person_id) {
                    $query = "INSERT INTO tasks_persons
                    (task_id,
                    person_id) VALUES
                    ('". $task_id_inserted ."',
                    '". $person_id ."')";

                    $this->db->conn->query($query);
                }
            }

            if (mysqli_affected_rows($this->db->conn) > 0) {
                return "SUCCESS_TASK_CREATED";
            } else {
                return "ERR_CREATING_TASK";
            }
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