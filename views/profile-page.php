<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";

    // *** Components
    require $current_directory . "/../components/page_layout/PageTitle.php";
    require $current_directory . "/../components/utils/FormUpdateUser.php";
?>

<?php require $current_directory . "/../parts/views_layout_top.php"; ?>
    
    <?php 
        $title = "Profile Page";
        $description = "Edit your profile settings here.";
        echo PageTitle($title, $description);
    ?>

    <!-- *** Page Cell Layouts -->
    <div class="grid-container-fluid components">
        <div class="grid-x grid-margin-x grid-x-component">
            <?php
                $cell_size = "6";
                echo FormUpdateUser($cell_size, $relative_directory, $db, $user);
            ?>
        </div>
    </div>

<?php require $current_directory . "/../parts/views_layout_bottom.php"; ?>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>