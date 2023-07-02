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
                                    <div class="item-top-section">
                                        <span>
                                            <div class="customer custom-label" style="background-color:#e3e3e3;">
                                                <p class="p-small" style="color:#e3e3e3;filter: contrast(0.1);">hawdaha 1</p>
                                            </div>
                                        </span>
                                        <span><p class="p-small">July 23</p></span>
                                    </div>
                                    
                                    <div class="item-title">
                                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, maxime.</h6>
                                    </div>

                                    <hr>

                                    <div class="item-bottom">
                                        <span class="item-hours">
                                            <i class="fa fa-clock"></i>
                                            <p class="p-small">6 hours</p>
                                        </span>

                                        <span class="item-images">
                                            <img src="../assets/images/user/ai_jhgajhdjawd.jpg" alt="">
                                            <img src="../assets/images/user/ai_jhgajhdjawd.jpg" alt="">
                                            <img src="../assets/images/user/ai_jhgajhdjawd.jpg" alt="">
                                        </span>
                                    </div>
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
                                <div class="item task-item-global">
                                    <div class="item-top-section">
                                        <span>
                                            <div class="customer custom-label" style="background-color:#e3e3e3;">
                                                <p class="p-small" style="color:#e3e3e3;filter: contrast(0.1);">hawdaha 1</p>
                                            </div>
                                        </span>
                                        <span><p class="p-small">July 23</p></span>
                                    </div>
                                    
                                    <div class="item-title">
                                        <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, maxime.</h6>
                                    </div>

                                    <hr>

                                    <div class="item-bottom">
                                        <span class="item-hours">
                                            <i class="fa fa-clock"></i>
                                            <p class="p-small">6 hours</p>
                                        </span>

                                        <span class="item-images">
                                            <img src="../assets/images/user/ai_jhgajhdjawd.jpg" alt="">
                                            <img src="../assets/images/user/ai_jhgajhdjawd.jpg" alt="">
                                            <img src="../assets/images/user/ai_jhgajhdjawd.jpg" alt="">
                                            <span class="item-image-counter">
                                                <p class="p-small">+5</p>
                                            </span>
                                        </span>
                                    </div>
                                </div>
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
                    revert: 200,
                    start: function (event, ui) {
                        ui.item.addClass("dragging-item");
                        $(".workflow-drop-section").addClass("active-drop-area");
                    },
                    stop: function (event, ui) {
                        ui.item.removeClass("dragging-item");
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