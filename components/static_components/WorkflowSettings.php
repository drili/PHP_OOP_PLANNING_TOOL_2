<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/workflow-settings.css">

<?php
    function WorkflowSettings() { 
        ob_start();
    ?>
        <div class="cell small-12 large-12 component-workflow-settings">

            <div class="boxed-section boxed-section-gray">
                <div class="workflow-settings-content">

                <div class="title">
                    <h4>Workflow Filters</h4>
                    <hr>
                </div>

                <div class="settings-content">
                    <section class="workflow-search section-mb-small">
                        <h6>Search</h6>

                        <form action="" method="POST">
                            <input class="" type="search" placeholder="Search task(s)">
                        </form>
                        <hr>
                    </section>

                    <section class="sprint-filters">
                        <h6>Sprint Filters</h6>

                        <form action="" method="POST">
                            <select name="select_sprint" id="SelectSprint" class="select-small">
                                <option value="1">Januar</option>
                                <option value="1">Januar</option>
                                <option value="1">Januar</option>
                            </select>

                            <select name="select_customer" id="SelectSprint" class="select-small">
                                <option value="1">Customer 1</option>
                                <option value="2">Customer 2</option>
                                <option value="3">Customer 3</option>
                            </select>

                            <button class="btn btn-secondary btn-extra-small margin-0">
                                Apply Sprint
                            </button>
                        </form>
                        <hr>
                    </section>
                </div>

                </div> <!-- .workflow-settings-content -->
            </div> <!-- .boxed-section -->

        </div>
    <?php
    
        $WorkflowSettings = ob_get_contents();
        ob_end_clean();

        return $WorkflowSettings;
    }
?>