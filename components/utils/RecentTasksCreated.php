<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/recent-tasks-created.css">

<?php
    function RecentTasksCreated($cell_size, $relative_directory, $db) { 
        ob_start();
    ?>
        <div class="cell small-12 large-<?php echo $cell_size; ?> component-recent-tasks-created">

            <div class="boxed-section">
                <div class="title">
                    <h4>Recently Created Tasks</h4>
                    <p>Tasks recently created <b><?php echo $_SESSION["user"]["username"]; ?></b></p>
                    <hr>
                </div>

                <div class="ajax-fetched-content RecentTasksCreated">

                </div>
            </div>

        </div>
    <?php
    
        $RecentTasksCreated = ob_get_contents();
        ob_end_clean();

        return $RecentTasksCreated;
    }
?>

<script src="<?php echo $relative_directory; ?>/__js/components/CustomLoader.js"></script>
<script src="<?php echo $relative_directory; ?>/__js/events/recent-tasks-created.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var event__RecentTasksCreated = new Event("RecentTasksCreated");
        document.dispatchEvent(event__RecentTasksCreated);
    })
</script>