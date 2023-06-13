<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = ".";

    // *** Include header.php & files
    require $current_directory . "/parts/header.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $register_result = $user->register($username, $email, $password);

        if ($register_result === "SUCCESS_USER_CREATED") {
            echo "::: REGISTER SUCCESS";
        } else {
            echo "::: ERROR LOGIN";
        }
    }
?>

<div class="container-outter">
    <div class="container-custom">

        <div class="grid-container-fluid">
            <div class="grid-x">

                <div class="cell cell-main small-12">
                    <div class="cell-inner">
                        <h1>REGISTER.PHP</h1>

                        <div class="box-register">
                            <form method="POST" action="">
                                <input type="text" name="username" placeholder="Username" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <button type="submit">Register</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- .cell-main -->

            </div>
        </div> <!-- .grid-container -->

    </div>
</div> <!-- .container-outter -->

<?php
    // *** Include footer.php
    require_once $current_directory . '/parts/footer.php';
?>
