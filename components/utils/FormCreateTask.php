<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/form-create-task.css">

<?php
    function FormCreateTask($cell_size, $relative_directory, $db) { 
        ob_start();

        // *** Prereq
        require $relative_directory . "/classes/Sprints.php";
        require $relative_directory . "/classes/Customers.php";
        require $relative_directory . "/classes/Persons.php";

        $sprints = new Sprints($db);
        $task_verticals = $sprints->getSprintVerticals();
        $sprint_labels = $sprints->getSprintLabels();
        $valid_sprints = $sprints->getValidSprints();

        $customers = new Customers($db);
        $all_customers = $customers->getAllCustomers();

        $persons = new Persons($db);
        $all_persons = $persons->getAllPersons();
    ?>

        <div class="grid-container-fluid component-form-create-task">
            <div class="grid-x grid-x-component">
                <div class="cell small-12 large-<?php echo $cell_size; ?>">

                    <div class="boxed-section">
                        <div class="title">
                            <h4>Fill out formular to create a new task</h4>
                            <p><b>9999</b> tasks has been created in total!</p>
                            <hr>
                        </div>

                        <div class="form-content">
                            <form action="">
                                <div class="grid-container-fluid component-form-create-task">
                                    <div class="grid-x grid-margin-x grid-x-component">
                                        
                                        <div class="cell small-12 large-6">
                                            <label for="task_name">Task Name</label>
                                            <input type="text" placeholder="More Bizz" name="task_name" required>
                                        </div>

                                        <div class="cell small-12 large-3">
                                            <label for="task_now">Task Low</label>
                                            <input type="number" min="1" placeholder="1" name="task_now" required>
                                        </div>

                                        <div class="cell small-12 large-3">
                                            <label for="task_high">Task High</label>
                                            <input type="number" max="100" placeholder="100" name="task_high" required>
                                        </div>

                                        <div class="cell small-12">
                                            <label for="task_description">Task Description</label>
                                            <div class="quill-box">
                                                <div class="quill-text-area">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="cell small-12 large-4">
                                            <label for="customers">Customers</label>
                                            <select name="" id="customers" required>
                                                <option disabled="" selected="" value="">Select Customer</option>
                                                <?php foreach($all_customers as $ac) : ?>
                                                    <option value="<?php echo $ac["customer_id"]; ?>">
                                                        <?php echo $ac["customer_name"]; ?>
                                                    </option>
                                                    
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="cell small-12 large-4">
                                            <label for="task_label">Task Label</label>
                                            <select name="" id="task_label" name="task_label">
                                                <option disabled="" selected="" value="">Select Label</option>
                                                <?php foreach($sprint_labels as $sl) : ?>
                                                    <option value="<?php echo $sl["label_id"]; ?>" style="background-color:<?php echo $sl["label_color"]; ?>">
                                                        <?php echo $sl["label_name"]; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="cell small-12 large-4">
                                            <label for="task_vertical">Task Vertical</label>
                                            <select name="" id="task_vertical" name="task_vertical" required>
                                                <option disabled="" selected="" value="">Select Vertical</option>
                                                <?php foreach($task_verticals as $tv) : ?>
                                                    <option value="<?php echo $tv["task_vertical_id"]; ?>">
                                                        <?php echo $tv["task_vertical_name"]; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="cell small-12">
                                            <label for="task_sprint">Sprint(s)</label>
                                            <div class="multi-select-box">
                                                <select data-placeholder="Choose sprint(s)" multiple class="js-example-basic-multiple">
                                                    <?php $valid_sprints_i = 0; ?>
                                                    <?php foreach($valid_sprints as $vs) : ?>
                                                        <option 
                                                            <?php echo ($valid_sprints_i == 0) ? "selected" : ""; ?>
                                                            value="<?php echo $vs["sprint_id"]; ?>"
                                                        >
                                                            <?php echo $vs["sprint_name"]; ?>
                                                        </option>
                                                        <?php $valid_sprints_i++; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="cell small-12">
                                            <label for="task_person">Person(s)</label>
                                            <div class="multi-select-box">
                                                <select data-placeholder="Choose person(s)" multiple class="js-example-basic-multiple" required>
                                                    <?php foreach($all_persons as $ap) : ?>
                                                        <option value="<?php echo $ap["id"]; ?>">
                                                            <?php echo $ap["username"]; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="cell small-12">
                                            <div class="buttons">
                                                <button class="btn btn-primary">Create Task</button>
                                                <button class="btn btn-secondary">Create Task - Keep settings</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    <?php

        $FormCreateTask = ob_get_contents();
        ob_end_clean();

        return $FormCreateTask;
    }
?>