<?php
    class DB {
        public $conn;

        public function __construct($hostname, $username, $password, $database) {
            $this->conn = new mysqli($hostname, $username, $password, $database);

            if ($this->conn->connect_errno) {
                die("Database connection failed: " . $this->conn->connect_error);
            }

            $this->conn->set_charset("utf8");
        }
    }