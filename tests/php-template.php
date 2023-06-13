<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = ".";

    // *** Include header.php & files
    require $current_directory . '/parts/header.php';
?>

<div class="container-outter">
    <div class="container-custom">

        <div class="grid-container-fluid">
            <div class="grid-x">

                <div class="cell cell-main small-12">
                    <div class="cell-inner">
                        <h1>INDEX.PHP</h1>
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
