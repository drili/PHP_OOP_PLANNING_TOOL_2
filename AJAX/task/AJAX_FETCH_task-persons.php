<?php
    // *** INIT session
    session_start();

    // *** Current directory
    $current_directory = dirname(__FILE__);

    // *** Include header.php & Classes
    require $current_directory . "/" . "../../parts/header_pre.php";
    require $current_directory . "/" . "../../classes/Persons.php";

    $requestBody = file_get_contents('php://input');
    $data = json_decode($requestBody, true);
    
    $task_id = $data["dataTaskId"];

    $persons = new Persons($db);
    $persons->task_id = $task_id;

    $persons_response = $persons->getAssignedTaskPersons();

    $persons_not_assigned = new Persons($db);
    $persons_not_assigned->task_id = $task_id;

    $persons_not_assigned_response = $persons_not_assigned->getNotAssignedTaskPersons();
    
    // var_dump($persons_not_assigned_response);
?>

<div class="task-settings task-settings-task-persons">
    <form action="" id="AssignTaskPerson">
        <label for="">Assign Person(s)</label>
        <select name="" id="">
            <option value="" selected disabled>Select Person</option>

            <?php foreach ($persons_not_assigned_response as $person) : ?>
                <option value="<?php echo $person["person_id"]; ?>"><?php echo $person["username"]; ?></option>
            <?php endforeach; ?>
        </select>
    </form>
</div>

<div class="task-assigned-persons">
    <?php foreach ($persons_response as $person) : ?>
        <span class="assigned-person">
            <div class="assigned-person-content">
                <img src="../assets/images/user/default-profile.jpg" alt="">
                <p><?php echo $person["username"]; ?></p>
            </div>
            
            <div class="assigned-person-content">
                <input class="input-small" type="number" step="10" value="0">
                <i class="fa fa-minus-circle" data-person-id="<?php echo $person["person_id"]; ?>"></i>
            </div>
        </span>
    <?php endforeach; ?>
</div>