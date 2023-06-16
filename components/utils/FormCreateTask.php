<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/form-create-task.css">

<?php
    function FormCreateTask($cell_size) {
        return '
            <div class="grid-container-fluid component-form-create-task">
                <div class="grid-x grid-x-component">
                    <div class="cell small-12 large-'. $cell_size  .'">

                        <div class="boxed-section">
                            <div class="title">
                                <h4>Fill out formular to create a new task</h4>
                                <p><b>9999</b> tasks has been created in total!</p>
                                <hr>
                            </div>

                            <div class="form-content">
                                <form action="">
                                    <div class="grid-container-fluid component-form-create-task">
                                        <div class="grid-x grid-x-component">
                                            
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
                                                <select name="" id="customers">
                                                    <option disabled="" selected="" value="">Select Customer</option>
                                                    <option value="0">AJ Produkter</option>
                                                    <option value="1">AJ Produkter</option>
                                                    <option value="2">AJ Produkter</option>
                                                </select>
                                            </div>

                                            <div class="cell small-12 large-4">
                                                <label for="task_label">Task Label</label>
                                                <select name="" id="task_label" name="task_label">
                                                    <option disabled="" selected="" value="">Select Label</option>
                                                    <option value="0">Adhoc</option>
                                                    <option value="1">Adhoc</option>
                                                    <option value="2">Adhoc</option>
                                                </select>
                                            </div>

                                            <div class="cell small-12 large-4">
                                                <label for="task_vertical">Task Vertical</label>
                                                <select name="" id="task_vertical" name="task_vertical">
                                                    <option disabled="" selected="" value="">Select Label</option>
                                                    <option value="0">SEO</option>
                                                    <option value="1">SEO</option>
                                                    <option value="2">SEO</option>
                                                </select>
                                            </div>

                                            <div class="cell small-12">
                                                <label for="task_sprint">Sprint(s)</label>
                                                <div class="multi-select-box">
                                                    <select data-placeholder="Choose sprint(s)" multiple class="js-example-basic-multiple">
                                                        <option value="0">January 2023</option>
                                                        <option value="1">January 2023</option>
                                                        <option value="2">January 2023</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="cell small-12">
                                                <label for="task_person">Person(s)</label>
                                                <div class="multi-select-box">
                                                    <select data-placeholder="Choose person(s)" multiple class="js-example-basic-multiple">
                                                        <option value="0">Bob Marley</option>
                                                        <option value="1">Bob Marley</option>
                                                        <option value="2">Bob Marley</option>
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
        ';
    }
?>