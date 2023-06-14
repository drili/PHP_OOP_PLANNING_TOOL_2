<?php
    class User {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function register($username, $email, $password) {
            $check_query = "SELECT * FROM users WHERE email = '$email'";
            $check_query_res = $this->db->conn->query($check_query);

            if ($check_query_res->num_rows > 0) {
                return "ERROR_USER_EXISTS";
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
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
                        'user_activated' => $user['user_activated'],
                        'darkmode' => $user["darkmode"],
                        'logged_in' => "LOGGED_IN"
                    );

                    return "SUCCESS_LOGIN";
                }
            }

            return "ERROR_LOGIN";
        }

        public function logout() {
            // *** Clear all session variables
            $_SESSION = array();
            unset($_SESSION["user"]);

            // *** Delete the session cookie
            if (ini_get("session.use_cookie")) {
                $params = session_get_cookie_params();

                setcookie(session_name(), "", time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // *** Destroy the session
            session_destroy();
        }

        public function getDarkModePreference($user_id) {
            $query = "SELECT darkmode FROM users WHERE id = $user_id";
            $query_res = $this->db->conn->query($query);

            if ($query_res && $query_res->num_rows > 0) {
                $row = $query_res->fetch_assoc();
                return $row["darkmode"];
            }

            return 0;
        }

        public function updateDarkModePreference($user_id, $darkmode) {
            $query = "UPDATE users SET darkmode = $darkmode WHERE id = $user_id";
            $query_res = $this->db->conn->query($query);

            if ($query_res === false) {
                return "ERROR_DARKMODE";
            } else {
                return "SUCCESS_DARKMODE";
            }
        }
    }