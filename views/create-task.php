<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";

    // *** Components
    require $current_directory . "/../components/page_layout/PageTitle.php";
    require $current_directory . "/../components/utils/FormCreateTask.php";
    require $current_directory . "/../components/utils/RecentTasksCreated.php";
?>

<?php require $current_directory . "/../parts/views_layout_top.php"; ?>
    <?php 
        $title = "Create Task";
        $description = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quo a hic qui odit laborum!";
        echo PageTitle($title, $description);
    ?>

    <!-- *** Page Cell Layouts -->
    <div class="grid-container-fluid components">
        <div class="grid-x grid-margin-x grid-x-component">
            <?php
                $cell_size = "8";
                echo FormCreateTask($cell_size, $relative_directory, $db);
            ?>

            <?php
                $cell_size = "4";
                echo RecentTasksCreated($cell_size, $relative_directory, $db);
            ?>
        </div>
    </div>
    
<?php require $current_directory . "/../parts/views_layout_bottom.php"; ?>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>