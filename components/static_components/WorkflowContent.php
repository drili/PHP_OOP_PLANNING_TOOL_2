<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/workflow-content.css">

<?php
    function WorkFlowContent() { 
        ob_start();
    ?>

        <div class="cell small-12 large-12 component-workflow-content">

            <div class="boxed-section boxed-section-none padding-0 margin-0">
                <div class="workflow-content-content">

                    <div class="workflow-content">
                        <div class="workflow-box workflow-box-backlog">
                            <section class="workflow-box-title">
                                <h4>Backlog</h4>
                            </section>

                            <div class="workflow-drop-section">
                                <div class="item">Item 1</div>
                                <div class="item">Item 2</div>
                                <div class="item">Item 3</div>
                            </div>
                        </div>

                        <div class="workflow-box workflow-box-todothisweek">
                            <section class="workflow-box-title">
                                <h4>This Week</h4>
                            </section>

                            <div class="workflow-drop-section">
                                
                            </div>
                        </div>

                        <div class="workflow-box workflow-box-inprogress">
                            <section class="workflow-box-title">
                                <h4>In Progress</h4>
                            </section>

                            <div class="workflow-drop-section">
                                
                            </div>
                        </div>

                        <div class="workflow-box workflow-box-done">
                            <section class="workflow-box-title">
                                <h4>Done</h4>
                            </section>

                            <div class="workflow-drop-section">
                                
                            </div>
                        </div>
                    </div>

                </div> <!-- .workflow-content-content -->
            </div> <!-- .boxed-section -->

        </div>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(document).ready(function() {
                $(".workflow-drop-section").sortable({
                    connectWith: ".workflow-drop-section",
                    placeholder: "highlight",
                    tolerance: "cursor"
                }).disableSelection();
            });
        </script>
    <?php
    
        $WorkFlowContent = ob_get_contents();
        ob_end_clean();

        return $WorkFlowContent;
    }
?>