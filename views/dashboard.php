<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";
?>

<?php require $current_directory . "/../parts/views_layout_top.php"; ?>
    <h1>DASHBOARD.PHP</h1>

    <a href="<?php echo $relative_directory; ?>/logout.php">logout</a>

<?php require $current_directory . "/../parts/views_layout_bottom.php"; ?>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>