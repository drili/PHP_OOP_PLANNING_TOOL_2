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
<?php echo "data_task_id:" . $data_task_id; ?>
<?php if ($response["query_status"] !== "ERR_FETCHING_TASK") : ?>
    <?php
        $response_query = $response["query_status"][0];
    ?>
    <div class="page-wrapper page-wrapper-modal">
        <section>
            <div class="task-modal">

                <div class="grid-container-fluid">
                    <div class="grid-x">

                        <div class="cell small-12 large-8 cell-padding-right">

                            <section class="form-top mb-40">
                                <label for="" class="label-custom mr-10" style="border: 1px solid <?php echo $response_query["customer_color"]; ?>; color: <?php echo $response_query["customer_color"]; ?> !important">
                                    <?php echo $response_query["customer_name"]; ?>
                                </label>

                                <label for="" class="label-custom mr-10" style="">
                                    <?php echo $response_query["task_vertical_name"]; ?>
                                </label>

                                <label for="" class="label-custom mr-10" style="border: 1px solid <?php echo $response_query["label_color"]; ?>; color: <?php echo $response_query["label_color"]; ?> !important;">
                                    <?php echo $response_query["label_name"]; ?>
                                </label>
                            </section>

                            <div class="content box-section">
                                <div>
                                    <form action="" class="form-create-task">
                                        <div class="grid-container-fluid">
                                            <div class="grid-x grid-x-space-between">

                                                <div class="cell small-12 large-7">
                                                    <span>
                                                        <label for="task_name">Task Name</label>
                                                        <input class="validate-required" required type="text" name="task_name" value="<?php echo $response_query["task_name"]; ?>">
                                                    </span>
                                                </div>

                                                <div class="cell small-12 large-2">
                                                    <span>
                                                        <label for="task_low">Task Low</label>
                                                        <input class="validate-required" required type="number" name="task_low" value="<?php echo $response_query["task_low"]; ?>">
                                                    </span>
                                                </div>

                                                <div class="cell small-12 large-2">
                                                    <span>
                                                        <label for="task_high">Task High</label>
                                                        <input class="validate-required" required type="number" name="task_high" value="<?php echo $response_query["task_high"]; ?>">
                                                    </span>
                                                </div>

                                                <div class="cell small-12 cell-description">
                                                    <span>
                                                        <div>
                                                            <label for="task_description">Task Description</label>
                                                            <div id="QuillEditorModal" class="task_description">
                                                                <?php echo $response_query["task_description"]; ?>
                                                            </div>
                                                        </div>
                                                        <!-- <textarea name="task_description" id="" rows="6"></textarea> -->
                                                    </span>
                                                </div>

                                                <div class="cell small-12">
                                                    <span>
                                                        <input type="submit" class="btn-inline btn-main mt-5 mr-10 btn-update-task" value="Update task" name="update_task">
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="cell small-12 large-4">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quidem similique sapiente eveniet suscipit repellat, laudantium eum sunt maiores deserunt hic vitae, ducimus dolore quod aliquam, quia ea explicabo velit?</p>
                        </div>
                    </div>
                </div>

            </div>
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