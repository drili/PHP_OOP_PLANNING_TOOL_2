<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);
    $relative_directory = "..";

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";
    require $current_directory . "/" . "../../classes/Sprints.php";

    // *** Components
    require $current_directory . "/" . "/../../components/utils/AccordionTitle.php";

    $requestBody = file_get_contents('php://input');
    $data = json_decode($requestBody, true);

    $data_task_id = $data["dataTaskId"];

    $tasks = new Tasks($db);
    $tasks->task_id = $data_task_id;

    $response = $tasks->fetchTask();
    $response = [
        "query_status" => $response
    ];
    $task_median = abs(round(($response["query_status"][0]["task_low"] + $response["query_status"][0]["task_high"]), 2) / 2);

    // *** Task time
    $task_time = new Tasks($db);
    $task_time->task_id = $data_task_id;

    $response_task_time = $task_time->taskTotalTimeRegistration();
    $response_task_time = [
        "query_status" => $response_task_time
    ];

    // *** Task activity time
    $task_related_times = new Tasks($db);
    $task_related_times->task_id = $data_task_id;

    $response_related_times = $task_related_times->taskRelatedTimeRegistrations();
    $response_related_times = [
        "query_status" => $response_related_times
    ];

    // *** Valid sprints
    $valid_sprints = new Sprints($db);
    $response_valid_sprints = $valid_sprints->getValidSprints();
?>

<?php if ($response["query_status"] !== "ERR_FETCHING_TASK") : ?>
    <?php
        $response_query = $response["query_status"][0];
    ?>
    <div class="page-wrapper page-wrapper-modal">
        <section>
            <div class="task-modal">

                <div class="grid-container-fluid">
                    <div class="grid-x grid-margin-x">

                        <div class="cell small-12 cell-section-top">
                            <section class="section-labels section-mb">
                                <div class="modal-label">
                                    <p><?php echo $response["query_status"][0]["customer_name"]; ?></p>
                                </div>

                                <div class="modal-label">
                                    <p>Task ID: <?php echo $data_task_id; ?></p>
                                </div>

                                <div class="modal-label">
                                    <p><?php echo $response["query_status"][0]["task_vertical_name"]; ?></p>
                                </div>

                                <div class="modal-label">
                                    <p><?php echo $response["query_status"][0]["label_name"]; ?></p>
                                </div>

                                <div class="modal-label">
                                    <p><?php echo $response["query_status"][0]["sprint_name"]; ?></p>
                                </div>
                            </section>
                        </div> <!-- .cell-section-top -->

                        <div class="cell small-12 large-8 cell-section-left">
                            <section class="section-update-form boxed-section section-mb">
                                <div class="title">
                                    <h4><?php echo $response["query_status"][0]["task_name"]; ?></h4>
                                    <hr>
                                </div>

                                <form action="" id="FormUpdateTask">
                                    <div class="grid-container-fluid div-form-update-task">
                                        <div class="grid-x grid-margin-x">

                                            <input type="hidden" name="task_id" value="<?php echo $data_task_id; ?>">

                                            <div class="cell small-12 large-8">
                                                <label for="task_name">Task Name</label>
                                                <input type="text" value="<?php echo $response["query_status"][0]["task_name"]; ?>" name="task_name" required>
                                            </div>

                                            <div class="cell small-12 large-2">
                                                <label for="task_low">Task Low</label>
                                                <input type="number" min="1" value="<?php echo $response["query_status"][0]["task_low"]; ?>" name="task_low" required>
                                            </div>

                                            <div class="cell small-12 large-2">
                                                <label for="task_high">Task High</label>
                                                <input type="number" max="100" value="<?php echo $response["query_status"][0]["task_high"]; ?>" name="task_high" required>
                                            </div>

                                            <div class="cell small-12 section-mb">
                                                <label for="task_description">Task Description</label>
                                                <div class="quill-box">
                                                    <div class="quill-text-area-modal">
                                                        <?php echo $response["query_status"][0]["task_description"]; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cell small-12 large-4">
                                                <div class="task-median">
                                                    <h5 class="section-underline">Task Median: <b><?php echo $task_median; ?></b></h5>
                                                </div>
                                            </div>

                                            <div class="cell small-12 large-8">
                                                <div class="buttons section-flex-right">
                                                    <button class="btn btn-secondary btn-update-task margin-0">Update Task</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- .div-form-update-task -->
                                </form> <!-- #FormUpdateTask -->
                            </section>

                            <section class="section-register-time-form boxed-section section-mb">
                                <div class="title">
                                    <h4>Register your time</h4>
                                    <hr>
                                </div>

                                <form action="" id="RegisterTaskTime">
                                    <div class="grid-container-fluid div-form-register-time">
                                        <div class="grid-x grid-margin-x grid-x-align-bottom">

                                            <input type="hidden" name="task_id" value="<?php echo $data_task_id; ?>">

                                            <div class="cell small-12 large-2">
                                                <label for="task_register_time">Hours</label>
                                                <input type="number" min="0.25" step=".25" value="0" name="task_register_time" required>
                                            </div>

                                            <div class="cell small-12 large-3">
                                                <label for="task_register_time_date">Date</label>
                                                <input id="datepicker" type="date" name="task_register_time_date" required>
                                            </div>

                                            <div class="cell small-12 large-3">
                                                <div class="buttons">
                                                    <button class="btn btn-primary btn-register-task-time margin-0">Register Time</button>
                                                </div>
                                            </div>

                                            <div class="cell small-12 large-4 section-flex-right">
                                                <section>
                                                    <h5>Total time registered</h5>
                                                    <br>
                                                    <h2 class="text-align-center">
                                                        <?php
                                                            if ($response_task_time["query_status"] == "ERR_FETCHING_TIME_REGISTRATIONS") {
                                                                echo "0";
                                                            } else {
                                                                echo array_sum($response_task_time["query_status"]);
                                                            }
                                                        ?>
                                                    </h2>
                                                </section>
                                            </div>

                                        </div>
                                    </div> <!-- .div-form-register-time -->
                                </form> <!-- #RegisterTaskTime -->
                            </section>

                            <section class="section-update-form boxed-section boxed-section-gray section-mb">
                                <?php
                                    $title = "Task Activity";

                                    if ($response_related_times["query_status"] == "ERR_FETCHING_RELATED_REGISTRATIONS") {
                                        $content = "No time registrations...";
                                    } else {
                                        $content = "";
                                        $content_items = "";

                                        $content .= "<table>";
                                            $content .= "<thead>";
                                                $content .= "<tr>";
                                                    $content .= "<th>Time Registration Amount</th>";
                                                    $content .= "<th>Person</th>";
                                                    $content .= "<th>Date</th>";
                                                $content .= "</tr>";
                                            $content .= "</thead>";

                                            $content .= "<tbody>";
                                            foreach ($response_related_times["query_status"] as $item) {
                                                $content_items .= "<tr>";
                                                    $content_items .= "<td>" . $item["time_registration_amount"] . "</td>";
                                                    $content_items .= "<td>" . $item["username"] . "</td>";
                                                    $content_items .= "<td>" . $item["time_registration_date"] . "</td>";
                                                $content_items .= "</tr>";
                                            }
                                            $content .= $content_items;
                                            $content .= "</tbody>";
                                        $content .= "</table>";
                                        $content .= "<div><p>Edit your own time registrations in the time registrations view.</p></div>";
                                    }

                                    echo AccordionTitle($title, $content);
                                ?>
                            </section>
                        </div> <!-- .cell-section-left -->

                        <div class="cell small-12 large-4 cell-section-right">
                            <section class="section-settings boxed-section boxed-section-gray section-mb">
                                <div class="title">
                                    <h4>Task Settings</h4>
                                    <hr>
                                </div>

                                <div class="task-settings task-settings-move-sprint section-mb">
                                    <form action="" id="MoveTaskSprint">
                                        <input type="hidden" name="task_id" value="<?php echo $data_task_id; ?>">

                                        <label for="">Assign task to new sprint</label>
                                        <select name="sprint_id" id="">
                                            <option value="" selected disabled>Select Sprint</option>
                                            <?php foreach($response_valid_sprints as $valid_sprint) : ?>
                                                <option value="<?php echo $valid_sprint["sprint_id"] ?>"><?php echo $valid_sprint["sprint_name"] ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="buttons">
                                            <button class="btn btn-secondary btn-extra-small btn-select-sprint margin-0">Apply New Sprint</button>
                                        </div>
                                    </form>
                                </div>

                                <hr>

                                <div class="task-settings task-settings-archive-task">
                                    <form action="" id="ArchiveTask">
                                        <div class="buttons">
                                            <button class="btn btn-delete btn-extra-small btn-delete-task margin-0"><i class="fa fa-trash"></i> Archive Task</button>
                                        </div>
                                    </form>
                                </div>
                            </section> <!-- .section-settings -->

                            <section class="section-settings-task-persons boxed-section boxed-section-gray section-mb">
                                <div class="title">
                                    <h4>Task Persons</h4>
                                    <hr>
                                </div>

                                <div class="task-settings task-settings-task-persons">
                                    <form action="" id="AssignTaskPerson">
                                        <label for="">Assign Person(s)</label>
                                        <select name="" id="">
                                            <option value="" selected disabled>Select Person</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </form>
                                </div>

                                <div class="task-assigned-persons">
                                    <span class="assigned-person">
                                        <div class="assigned-person-content">
                                            <img src="<?php echo $relative_directory; ?>/assets/images/user/default-profile.jpg" alt="">
                                            <p>Username</p>
                                        </div>
                                        
                                        <div class="assigned-person-content">
                                            <input class="input-small" type="number" step="10" value="0">
                                            <i class="fa fa-minus-circle"></i>
                                        </div>
                                    </span>
                                    
                                    <span class="assigned-person">
                                        <div class="assigned-person-content">
                                            <img src="<?php echo $relative_directory; ?>/assets/images/user/default-profile.jpg" alt="">
                                            <p>Username Two</p>
                                        </div>
                                        
                                        <div class="assigned-person-content">
                                            <input class="input-small" type="number" step="10" value="0">
                                            <i class="fa fa-minus-circle"></i>
                                        </div>
                                    </span>
                                </div>
                            </section>
                        </div> <!-- .cell-section-right -->

                    </div> <!-- .grid-x grid-margin-x -->
                </div>

            </div> <!-- .task-modal -->
        </section>
    </div>
<?php else : ?>
    <div class="fetch-error">
        <p>There was an error fetching data.</p>
    </div>
<?php endif; ?>