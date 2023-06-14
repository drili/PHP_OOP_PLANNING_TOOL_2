<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";
?>

<link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/pages/page_activation.css">

<div class="container-outter container-boxed container-activation">
    <div class="container-custom">

        <div class="grid-container-fluid">
            <div class="grid-x grid-x-activation">

                <div class="cell cell-main small-12 large-6">
                    <div class="cell-inner">
                        <img src="<?php echo $relative_directory; ?>/assets/images/stock/pexels-dina-nasyrova-7421920.jpg" alt="">
                    </div>
                </div> <!-- .cell-main -->

                <div class="cell cell-main small-12 large-3 large-offset-2">
                    <div class="cell-inner">
                        <div class="title-section section-mb">
                            <h1>Authentication Error</h1>
                            <p>Sorry! Your account has not been activated yet. Please wait and log back in later.</p>
                        </div>

                        <div class="misc">
                            <hr>
                            <section class="link-section">
                                <a href="<?php echo $relative_directory; ?>/logout.php">Logout</a>
                            </section>
                        </div>
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
    require_once $current_directory . '/../parts/footer.php';
?>