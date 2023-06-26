<?php
    class Persons {
        private $db;
        public $task_id;
        public $person_id;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getAllPersons() {
            $query = "SELECT * FROM users";
            $query_res = $this->db->conn->query($query);
            
            $persons_array = array();
            while ($row = $query_res->fetch_assoc()) {
                $persons_array[] = $row;
            }

            return $persons_array;
        }

        public function getAssignedTaskPersons() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);

            $query = "SELECT tasks_persons.*,
            users.*
            FROM tasks_persons
            LEFT JOIN users ON tasks_persons.person_id = users.id
            WHERE tasks_persons.task_id = $task_id";
            $query_res = $this->db->conn->query($query);

            $persons_array = array();
            while ($row = $query_res->fetch_assoc()) {
                $persons_array[] = $row;
            }

            return $persons_array;
        }

        public function getNotAssignedTaskPersons() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);

            $query_assigned_persons = "SELECT tasks_persons.* FROM tasks_persons
            WHERE tasks_persons.task_id = $task_id";
            $query_assigned_persons_res = $this->db->conn->query($query_assigned_persons);

            $assigned_persons_ids = array();
            while ($row = mysqli_fetch_assoc($query_assigned_persons_res)) {
                $assigned_persons_ids[] = $row["person_id"];
            }

            $not_assigned = "SELECT * FROM users WHERE id NOT IN (" . implode(",", $assigned_persons_ids) . ")";
            $not_assigned_res = $this->db->conn->query($not_assigned);

            if ($not_assigned_res->num_rows > 0) {
                $not_assigned_persons = array();
                while ($row = $not_assigned_res->fetch_assoc()) {
                    $not_assigned_persons[] = $row;
                }

                return $not_assigned_persons;
            } else {
                return "ERR_ASSIGNED_PERSONS";
            }
        }

        public function assignTaskPerson() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);
            $person_id = mysqli_real_escape_string($this->db->conn, $this->person_id);

            $query = "INSERT INTO tasks_persons (task_id, person_id) VALUES ('$task_id', '$person_id')";
            $this->db->conn->query($query);

            if (mysqli_affected_rows($this->db->conn) > 0) {
                return "SUCCESS_ASSIGN_PERSON";
            } else {
                return "ERROR_ASSIGN_PERSON";
            }
        }

        public function unAssignTaskPerson() {
            $task_id = mysqli_real_escape_string($this->db->conn, $this->task_id);
            $person_id = mysqli_real_escape_string($this->db->conn, $this->person_id);

            $query = "DELETE FROM tasks_persons WHERE task_id = $task_id AND person_id = $person_id";
            $this->db->conn->query($query);

            if (mysqli_affected_rows($this->db->conn) > 0) {
                return "SUCCESS_UNASSIGN_PERSON";
            } else {
                return "ERROR_UNASSIGN_PERSON";
            }
        }
    }