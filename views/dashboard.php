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
    require $current_directory . "/../components/static_components/charts/TimeRegistrationsThisWeek.php";
    require $current_directory . "/../components/static_components/tables/TeamEffortsTable.php";

    // *** Classes
    require $current_directory . "/../classes/Info.php";
    require $current_directory . "/../classes/Sprints.php";

    $sprint_info = new Sprints($db);
    $current_sprint_id = $sprint_info->getCurrentSprintID();
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
                            $info_time_registered = new Info($db);
                            $info_time_registered->sprint_id = $current_sprint_id;
                            $info_time_registered->user_id = $_SESSION["user"]["id"];
                            $info_time_registered_res = $info_time_registered->timeRegisteredThisSprint();

                            $cell_size = "4";
                            $array_data = [
                                "value" => $info_time_registered_res[0]["tr_amount"],
                                "suffix" => "Hours",
                                "total" => "100"
                            ];
                            $card_title = "Registered Time This Sprint";
                            $card_icon = "fa-clock";
                            $cell_color = "";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color);
                        ?>

                        <?php 
                            $cell_size = "4";
                            $array_data = [
                                "value" => "10",
                                "suffix" => "Hours",
                                "total" => "100"
                            ];
                            $card_title = "Total Time This Sprint";
                            $card_icon = "fa-clock";
                            $cell_color = "";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color);
                        ?>

                        <?php 
                            $cell_size = "4";
                            $array_data = [
                                "value" => "231",
                                "suffix" => "Hours",
                                "total" => "1020"
                            ];
                            $card_title = "Finished Tasks This Sprint";
                            $card_icon = "fa-clock";
                            $cell_color = "";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color);
                        ?>

                        <?php 
                            $cell_size = "4";
                            $array_data = [
                                "value" => "20",
                                "suffix" => "Hours",
                                "total" => "120"
                            ];
                            $card_title = "Recommended daily avg. work time this sprint";
                            $card_icon = "fa-clock";
                            $cell_color = "primary";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color);
                        ?>

                        <?php
                            $cell_size = "8";
                            echo TimeRegistrationsThisWeek($cell_size);
                        ?>

                        <?php
                            $cell_size = "12";
                            echo TeamEffortsTable($cell_size);
                        ?>

                    </div>
                </div>
            </div>

            <div class="cell small-12 large-3">
                <div class="grid-container-fluid components">
                    <div class="grid-x grid-margin-x grid-x-component grid-x-height-full">

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