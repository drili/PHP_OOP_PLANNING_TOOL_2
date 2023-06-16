<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";

    // *** Components
    require $current_directory . "/../components/page_layout/PageTitle.php";
    require $current_directory . "/../components/utils/FormCreateTask.php";
?>

<?php require $current_directory . "/../parts/views_layout_top.php"; ?>
    <?php 
        $title = "Create Task";
        $description = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quo a hic qui odit laborum!";
        echo PageTitle($title, $description);
    ?>

    <?php
        $cell_size = "8";
        echo FormCreateTask($cell_size);
    ?>
    
<?php require $current_directory . "/../parts/views_layout_bottom.php"; ?>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>