<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = ".";

    // *** Include header.php & files
    require $current_directory . "/parts/header.php";

    // FIXME:
    // - Refactor to AJAX request
    // if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     $login_res = $user->login($email, $password);

    //     if($login_res === "SUCCESS_LOGIN") {
    //         echo "::: LOGIN SUCCESS";
    //     } else {
    //         echo "::: LOGIN FAILED";
    //     }
    // }
?>

<div class="container-outter">
    <div class="container-custom">

        <div class="grid-container-fluid">
            <div class="grid-x">

                <div class="cell cell-main small-12">
                    <div class="cell-inner">
                        <h1>INDEX.PHP</h1>

                        <div class="box-register">
                            <form method="POST" action="" id="loginForm">
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <button type="submit">Login</button>
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

<script src="__js/pages/root/index.js"></script>