<?php
    class Persons {
        private $db;

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
    }