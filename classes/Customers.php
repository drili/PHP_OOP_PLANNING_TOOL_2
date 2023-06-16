<?php
    class Customers {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getAllCustomers() {
            $query = "SELECT * FROM customers";
            $query_res = $this->db->conn->query($query);
            
            $customers_array = array();
            while ($row = $query_res->fetch_assoc()) {
                $customers_array[] = $row;
            }

            return $customers_array;
        }
    }