<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/team-efforts-table.css">

<?php
    function TeamEffortsTable($cell_size, $data_array) { 
        ob_start();
    ?>
        <div class="cell small-12 large-<?php echo $cell_size; ?> component-team-efforts-table">

            <div class="boxed-section boxed-section-none">
                <div class="time-reg-content">

                <div class="title">
                    <h2>Team Efforts Table</h2>
                    <p>Your team effort this sprint - attributed across internal & client time.</p>
                    <hr>
                </div>

                <div class="content">
                    <table>
                        
                        <thead>
                            <tr class="tr-caption">
                                <th>
                                    <h4>Team Members</h4>
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <button class="btn btn-secondary btn-full btn-extra-small btn-expand-table">
                                        Expand Table
                                    </button>
                                </th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Internal Time</th>
                                <th>Client Time</th>
                                <th>Sick Time</th>
                                <th>Off Time</th>
                                <th>Total Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data_array["result"] as $data) : ?>
                                <?php
                                    if ($data["profile_image"] == null || $data["profile_image"] == "") {
                                        $profile_img = "default-profile.jpg";
                                    } else {
                                        $profile_img = $data["profile_image"];
                                    }
                                ?>
                                <tr>
                                    <td class="td-image-column">
                                        <img src="../assets/images/user/<?php echo $profile_img; ?>" alt="">
                                        <p><?php echo $data["username"]; ?></p>
                                    </td>
                                    <td class="td-internal">
                                        <p><?php echo $data["sum_internal_time"]; ?></p>
                                    </td>
                                    <td class="td-client">
                                        <p><?php echo $data["sum_client_time"]; ?></p>
                                    </td>
                                    <td class="td-sick">
                                        <p><?php echo $data["sum_sicktime_time"]; ?></p>
                                    </td>
                                    <td class="td-offtime">
                                        <p><?php echo $data["sum_offtime_time"]; ?></p>
                                    </td>
                                    <td>
                                        <p><?php echo ($data["sum_total"] > 0) ? $data["sum_total"] : 0 ; ?></p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                </div> <!-- .time-reg-content -->
            </div> <!-- .boxed-section -->

        </div>
    <?php
    
        $TeamEffortsTable = ob_get_contents();
        ob_end_clean();

        return $TeamEffortsTable;
    }
?>