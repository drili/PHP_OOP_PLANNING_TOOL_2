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
            echo $register_result;
        } else {
            echo $register_result;
        }
    }
?>

<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/pages/page_register.css">

<div class="container-outter container-boxed container-index">
    <div class="container-custom">

        <div class="grid-container-fluid">
            <div class="grid-x grid-x-index">

                <div class="cell cell-main small-12 large-3 large-offset-1">
                    <div class="cell-inner">
                        <div class="title-section section-mb">
                            <h1>Register</h1>
                            <p>Fill out the form to register a new user</p>
                        </div>

                        <div class="box-register">
                            <form method="POST" action="">
                                <input type="text" name="username" placeholder="Username" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <button type="submit" class="btn btn-primary btn-full">Register</button>
                            </form>
                        </div>

                        <div class="misc">
                            <hr>
                            <section class="link-section">
                                <p>Already registered?</p>
                                <a href="index.php">Login</a>
                            </section>
                        </div>
                    </div>
                </div> <!-- .cell-main -->

                <div class="cell cell-main small-12 large-6 large-offset-2">
                    <div class="cell-inner">
                        <img src="<?php echo $relative_directory; ?>/assets/images/stock/pexels-sharefaith-1231265.jpg" alt="">
                    </div>
                </div> <!-- .cell-main -->

                <div class="div-logo">
                <i class="gg-quote-o"></i>
                </div>

            </div>
        </div> <!-- .grid-container -->

    </div>
</div> <!-- .container-outter -->

<?php
    // *** Include footer.php
    require_once $current_directory . '/parts/footer.php';
?>