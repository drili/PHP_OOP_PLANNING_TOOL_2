<?php
    class User {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function register($username, $email, $password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
            $result = $this->db->conn->query($query);

            if ($result) {
                return "SUCCESS_USER_CREATED";
            } else {
                return "ERROR_USER_CREATED";
            }
        }

        public function login($email, $password) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->db->conn->query($query);

            if($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user["password"])) {
                    $_SESSION['user'] = array(
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'created_at' => $user['created_at'],
                        'profile_image' => $user['profile_image'],
                        'user_title' => $user['user_title'],
                        'user_role' => $user['user_role'],
                        'user_activated' => $user['user_activated']
                    );

                    return "SUCCESS_LOGIN";
                }
            }

            return "ERROR_LOGIN";
        }

        public function logout() {
            unset($_SESSION["user"]);
        }
    }