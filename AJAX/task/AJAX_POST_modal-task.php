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
                            <section class="section-labels">
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
                            <section class="section-update-form boxed-section">
                                <form action="" class="FormUpdateTask">
                                    <h2>Form Update Task</h2>
                                </form>
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