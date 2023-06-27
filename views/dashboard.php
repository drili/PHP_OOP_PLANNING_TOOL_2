<?php
    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & files
    require $current_directory . "/../parts/header.php";

    // *** Components
    require $current_directory . "/../components/page_layout/PageTitle.php";
    require $current_directory . "/../components/utils/Card.php";
    require $current_directory . "/../components/static_components/DashboardSettings.php";
?>

<?php require $current_directory . "/../parts/views_layout_top.php"; ?>
    <?php 
        $title = "Dashboard";
        $description = "Welcome to Zoot dashboard. A short overview of your selected sprint.";
        echo PageTitle($title, $description);
    ?>

    <!-- *** Page Cell Layouts -->
    <div class="grid-container-fluid components">
        <div class="grid-x grid-margin-x grid-x-component">
            
            <div class="cell small-12 large-9">
                <div class="grid-container-fluid components">
                    <div class="grid-x grid-margin-x grid-x-component">

                        <?php 
                            $cell_size = "4";
                            $array_data = "";
                            $card_title = "Registered Time This Sprint";
                            $card_icon = "fa-clock";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon);
                        ?>

                        <?php 
                            $cell_size = "4";
                            $array_data = "";
                            $card_title = "Total Time This Sprint";
                            $card_icon = "fa-clock";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon);
                        ?>

                        <?php 
                            $cell_size = "4";
                            $array_data = "";
                            $card_title = "Finished Tasks This Sprint";
                            $card_icon = "fa-clock";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon);
                        ?>

                    </div>
                </div>
            </div>

            <div class="cell small-12 large-3">
                <div class="grid-container-fluid components">
                    <div class="grid-x grid-margin-x grid-x-component">

                        <?php 
                            echo DashboardSettings();
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