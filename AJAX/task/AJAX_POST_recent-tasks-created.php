<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Tasks.php";

    $tasks = new Tasks($db);
    $latest_tasks = $tasks->fetchLatestTasksByUser($_SESSION["user"]["id"]);

    $response = [
        "query_status" => $latest_tasks
    ];
?>
<?php if ($response["query_status"] !== "ERR_FETCHING_TASKS_BY_USER") : ?>
    <?php foreach($response["query_status"] as $value) : ?>
        <div class="task-single task-fetched-single task-fetched-<?php echo $value["task_id"]; ?>" data-task-id="<?php echo $value["task_id"]; ?>">
            <div class="customer">
                <p>Customer</p>
            </div>
            <div class="title">
                <h6><?php echo $value["task_name"]; ?></h6>
            </div>

            <div class="task-date">
                <i class="fa fa-clock"></i>
                <p class="small-p"><?php echo $value["created_at"]; ?></p>
            </div>
            
       </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="fetch-error">
        <p>There was an error fetching data.</p>
    </div>
<?php endif; ?>