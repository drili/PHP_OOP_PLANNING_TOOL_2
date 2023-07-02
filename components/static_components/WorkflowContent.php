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
                                <div class="item task-item-global">
                                    Item 1
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis facilis praesentium nihil officiis possimus sed blanditiis sit ut doloribus repudiandae! </p>
                                </div>
                                <div class="item task-item-global">Item 2</div>
                                <div class="item task-item-global">Item 3</div>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script>
            $(document).ready(function() {
                $(".workflow-drop-section").sortable({
                    connectWith: ".workflow-drop-section",
                    placeholder: "highlight",
                    tolerance: "pointer",
                    // revert: "true"
                    start: function (event, ui) {
                        $(".workflow-drop-section").addClass("active-drop-area");
                    },
                    stop: function (event, ui) {
                        $(".workflow-drop-section").removeClass("active-drop-area");
                    }
                }).disableSelection();
            });
        </script>
    <?php
    
        $WorkFlowContent = ob_get_contents();
        ob_end_clean();

        return $WorkFlowContent;
    }
?>