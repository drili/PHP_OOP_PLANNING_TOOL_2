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

    if (isset($_GET["sprint_id"])) {
        $current_sprint_id = $_GET["sprint_id"];
    } else {
        $sprint_info = new Sprints($db);
        $current_sprint_id = $sprint_info->getCurrentSprintID();
    }

    $info_total_time = new Info($db);
    $info_total_time->sprint_id = $current_sprint_id;
    $info_total_time_res = $info_total_time->totalTimeThisSprint();

    $total_allocated_time = new Info($db);
    $total_allocated_time->sprint_id = $current_sprint_id;
    $total_allocated_time->user_id = $_SESSION["user"]["id"];
    $total_allocated_time_res = $total_allocated_time->totalAllocatedTimeThisSprint();
    
    $user_finished_tasks = new Info($db);
    $user_finished_tasks->user_id = $_SESSION["user"]["id"];
    $user_finished_tasks_res = $user_finished_tasks->userFinishedTasks();

    $user_time_reg_counts = new Info($db);
    $user_time_reg_counts->user_id = $_SESSION["user"]["id"];
    $user_time_reg_counts->sprint_id = $current_sprint_id;
    $user_time_reg_counts_res = $user_time_reg_counts->userTimeRegistrationsCount();

    $team_effort_array = new Info($db);
    $team_effort_array->sprint_id = $current_sprint_id;
    $team_effort_array_res = $team_effort_array->teamTimeRegistrations();

    $sprints = new Sprints($db);
    $sprints_arr = $sprints->getAllSprints();
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
                                "total" => $info_total_time_res
                            ];
                            $card_title = "Registered Time This Sprint";
                            $card_icon = "fa-clock";
                            $cell_color = "";
                            $card_height = "";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color, $card_height);
                        ?>

                        <?php 
                            $cell_size = "4";
                            $array_data = [
                                "value" => round($total_allocated_time_res["task_median"] ,2),
                                "suffix" => "Hours",
                                "total" => $info_total_time_res
                             ];
                            $card_title = "Allocated Time This Sprint";
                            $card_icon = "fa-hourglass-2";
                            $cell_color = "";
                            $card_height = "";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color, $card_height);
                        ?>

                        <?php 
                            $tasks_finished = 0;
                            $tasks_total = count($user_finished_tasks_res);
                            foreach ($user_finished_tasks_res as $task) {
                                if ($task["task_workflow_status"] == 3) {
                                    $tasks_finished++;
                                }
                            }

                            $cell_size = "4";
                            $array_data = [
                                "value" => $tasks_finished,
                                "suffix" => "tasks",
                                "total" => $tasks_total
                            ];
                            $card_title = "Finished Tasks This Sprint";
                            $card_icon = "fa-check";
                            $cell_color = "";
                            $card_height = "";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color, $card_height);
                        ?>

                        <?php
                            $cell_size = "4";
                            $array_data = [
                                "value" => $user_time_reg_counts_res,
                                "suffix" => "Reg(s)",
                                "total" => $user_time_reg_counts_res
                            ];
                            $card_title = "Time registrations this sprint";
                            $card_icon = "fa-plus";
                            $cell_color = "primary";
                            $card_height = "100%";
                            echo Card($cell_size, $relative_directory, $array_data, $card_title, $card_icon, $cell_color, $card_height);
                        ?>

                        <?php
                            $cell_size = "8";
                            $cell_height = "100%";
                            echo TimeRegistrationsThisWeek($cell_size, $cell_height);
                        ?>

                        <?php
                            $cell_size = "12";
                            echo TeamEffortsTable($cell_size, $team_effort_array_res);
                        ?>

                    </div>
                </div>
            </div>

            <div class="cell small-12 large-3">
                <div class="grid-container-fluid components">
                    <div class="grid-x grid-margin-x grid-x-component grid-x-height-full">

                        <?php 
                            echo DashboardSettings($sprints_arr, $current_sprint_id);
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