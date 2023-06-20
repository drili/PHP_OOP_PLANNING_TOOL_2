<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

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
                                        <div class="grid-x grid-margin-x grid-x-component">

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
                                                    <button class="btn btn-primary btn-update-task margin-0">Update Task</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- .div-form-update-task -->
                                </form> <!-- #FormUpdateTask -->
                            </section>

                            <section class="section-register-time-form boxed-section section-mb">
                                <h2>Hello</h2>
                            </section>
                        </div> <!-- .cell-section-left -->

                        <div class="cell small-12 large-4 cell-section-right">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero voluptatem molestiae reiciendis, facilis perspiciatis fugit rerum sapiente eius cum placeat.</p>
                        </div> <!-- .cell-section-right -->

                    </div> <!-- .grid-x grid-margin-x -->
                </div>

            </div> <!-- .task-modal -->
        </section>
    </div>

    <div>
        <h2>ALL:</h2>
        <pre>
            <?php var_dump($response["query_status"][0]); ?>
        </pre>
    </div>
<?php else : ?>
    <div class="fetch-error">
        <p>There was an error fetching data.</p>
    </div>
<?php endif; ?>