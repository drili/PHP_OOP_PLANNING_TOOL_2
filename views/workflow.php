<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";
    require $current_directory . "/../components/page_layout/PageTitle.php";
    require $current_directory . "/../components/static_components/WorkflowSettings.php";
    require $current_directory . "/../components/static_components/WorkFlowContent.php";

?>

<?php require $current_directory . "/../parts/views_layout_top.php"; ?>
    <?php 
        $title = "Workflow";
        $description = "Welcome to your workflow area. Complete tasks by dragging them to the 'done' column.";
        echo PageTitle($title, $description);
    ?>

    <!-- *** Page Cell Layouts -->
    <div class="grid-container-fluid components">
        <div class="grid-x grid-margin-x grid-x-component">
            
            <div class="cell small-12 large-9">
                <div class="grid-container-fluid components">
                    <div class="grid-x grid-margin-x grid-x-component">
                        <?php 
                            echo WorkFlowContent();
                        ?>
                    </div>
                </div>
            </div>

            <div class="cell small-12 large-3">
                <div class="grid-container-fluid components">
                    <div class="grid-x grid-margin-x grid-x-component grid-x-height-full">

                        <?php 
                            echo WorkflowSettings();
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>

<?php require $current_directory . "/../parts/views_layout_bottom.php"; ?>

<?php
    // *** Include footer.php
    require_once $current_directory . '/../parts/footer.php';
?>