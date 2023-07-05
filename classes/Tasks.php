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
        public $task_id;


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
                $task_persons_count = count($this->task_persons);
                $time_percentage_total = 100;
                $time_percentage_alloc = abs(round(($time_percentage_total / $task_persons_count) ,2));

                foreach ($this->task_persons as $person_id) {
                    $query = "INSERT INTO tasks_persons
                    (task_id,
                    person_id,
                    time_percentage_allocated) VALUES
                    ('". $task_id_inserted ."',
                    '". $person_id ."',
                    '". $time_percentage_alloc ."')";

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
            $task_name = mysqli_real_escape_string($this->db->conn, $this->task_name);
            $task_low = mysqli_real_escape_string($this->db->conn, $this->task_low);
            $task_high = mysqli_real_escape_string($this->db->conn, $this->task_high);
            $task_description = mysqli_real_escape_string($this->db->conn, $this->task_description);
            $task_id  = mysqli_real_escape_string($this->db->conn, $this->task_id);
            
            $query = "UPDATE tasks SET
            task_name = '$task_name',
            task_low = '$task_low',
            task_high = '$task_high',
            task_description = '$task_description'
            WHERE task_id = $task_id";

            $result = $this->db->conn->query($query);

            if ($result === false) {
                return "ERR_TASK_UPDATED: " . $this->db->conn->error;
            } else {
                if (mysqli_affected_rows($this->db->conn) > 0) {
                    return "SUCCESS_TASK_UPDATED";
                } else {
                    return "ERR_TASK_UPDATED";
                }
            }
        }

        public function updateTaskSprint() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);
            $sprint_id = mysqli_real_escape_string($this->db->conn, $this->sprint_id);
            
            $query = "UPDATE tasks SET
            sprint_id = '$sprint_id'
            WHERE task_id = $task_id";

            $result = $this->db->conn->query($query);

            if ($result === false) {
                return "ERR_TASK_UPDATED: " . $this->db->conn->error;
            } else {
                if (mysqli_affected_rows($this->db->conn) > 0) {
                    return "SUCCESS_TASK_UPDATED";
                } else {
                    return "ERR_TASK_UPDATED";
                }
            }
        }

        public function archiveTask() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);

            $query = "UPDATE tasks SET 
            is_archived = '1'
            WHERE task_id = $task_id";

            $result = $this->db->conn->query($query);

            if ($result === false) {
                return "ERR_ARCHIVING_TASK";
            } else {
                if (mysqli_affected_rows($this->db->conn) > 0) {
                    return "SUCCESS_ARCHIVING_TASK";
                } else {
                    return "ERR_ARCHIVING_TASK";
                }
            }
        }

        public function fetchTask() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);

            $query = "SELECT 
            tasks.*, 
            sprints.*,
            customers.*,
            task_verticals.*,
            task_labels.*,
            GROUP_CONCAT(tasks_persons.person_id) as persons_ids
            FROM tasks
            LEFT JOIN sprints ON tasks.sprint_id = sprints.sprint_id
            LEFT JOIN tasks_persons ON tasks.task_id = tasks_persons.task_id
            LEFT JOIN customers ON tasks.customer_id = customers.customer_id
            LEFT JOIN task_verticals ON tasks.task_vertical_id = task_verticals.task_vertical_id
            LEFT JOIN task_labels ON tasks.label_id = task_labels.label_id
            WHERE tasks.task_id = '".$task_id."'
            GROUP BY tasks.task_id";
            // $query = "SELECT *
            // FROM tasks
            // LEFT JOIN sprints ON tasks.sprint_id = sprints.sprint_id
            // LEFT JOIN tasks_persons ON tasks.task_id = tasks_persons.task_id
            // WHERE tasks.task_id = '".$task_id."'";

            $query_res = $this->db->conn->query($query);

            if ($query_res->num_rows > 0) {
                $task_array = array();
                while ($row = $query_res->fetch_assoc()) {
                    $task_array[] = $row;
                }

                return $task_array;
            } else {
                return "ERR_FETCHING_TASK";
            }
        }

        public function fetchLatestTasksByUser($user_id) {
            $query = "SELECT 
            tasks.*,
            customers.* 
            FROM tasks
            LEFT JOIN customers ON tasks.customer_id = customers.customer_id
            WHERE tasks.created_by = '".$user_id."'
            AND tasks.is_archived = '0'
            ORDER BY task_id DESC LIMIT 5";
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

        public function taskTimeRegistration() {
            $time_registration_amount = mysqli_real_escape_string($this->db->conn, $this->time_registration_amount);
            $time_registration_date = mysqli_real_escape_string($this->db->conn, $this->time_registration_date);
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);
            $person_id = mysqli_real_escape_string($this->db->conn, $this->person_id);
            $time_registration_note = mysqli_real_escape_string($this->db->conn, $this->time_registration_note);
            $task_registration_type = mysqli_real_escape_string($this->db->conn, $this->task_registration_type);

            $query = "INSERT INTO time_registrations
            (time_registration_amount,
            time_registration_date,
            task_id,
            person_id,
            time_registration_note,
            registration_type) VALUES
            ('$time_registration_amount',
            '$time_registration_date',
            '$task_id',
            '$person_id',
            '$time_registration_note',
            '$task_registration_type')";

            $this->db->conn->query($query);

            if (mysqli_affected_rows($this->db->conn) > 0) {
                return "SUCCESS_TIME_REGISTRATION";
            } else {
                return "ERR_TIME_REGISTRATION";
            }
        }

        public function taskTotalTimeRegistration() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);

            $query = "SELECT * FROM time_registrations WHERE task_id = $task_id";
            $query_res = $this->db->conn->query($query);

            if ($query_res->num_rows > 0) {
                $time_registrations_array = array();
                while ($row = $query_res->fetch_assoc()) {
                    $time_registrations_array[] = $row["time_registration_amount"];
                }

                return $time_registrations_array;
            } else {
                return "ERR_FETCHING_TIME_REGISTRATIONS";
            }
        }

        public function taskRelatedTimeRegistrations() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);

            $query = "SELECT time_registrations.*,
            users.*
            FROM time_registrations
            LEFT JOIN users ON time_registrations.person_id = users.id
            WHERE task_id = $task_id";

            $query_res = $this->db->conn->query($query);
            if ($query_res->num_rows > 0) {
                $time_registrations_array = array();
                while ($row = $query_res->fetch_assoc()) {
                    $time_registrations_array[] = $row;
                }

                return $time_registrations_array;
            } else {
                return "ERR_FETCHING_RELATED_REGISTRATIONS";
            }
        }

    }