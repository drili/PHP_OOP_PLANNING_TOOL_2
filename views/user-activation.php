<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";
?>

<div class="container-outter">
    <div class="container-custom">

        <div class="grid-container-fluid">
            <div class="grid-x">

                <div class="cell cell-main small-12">
                    <div class="cell-inner">
                        <h1>USER-ACTIVATION.PHP</h1>
                        <p>Your user has not been activated!</p>

                        <a href="<?php echo $relative_directory; ?>/logout.php">logout</a>
                    </div>
                </div> <!-- .cell-main -->

            </div>
        </div> <!-- .grid-container -->

    </div>
</div> <!-- .container-outter -->

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>