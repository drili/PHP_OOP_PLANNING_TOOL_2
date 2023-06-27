<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/team-efforts-table.css">

<?php
    function TeamEffortsTable($cell_size) { 
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
                            <tr>
                                <td class="td-image-column">
                                    <img src="../assets/images/user/<?php echo $_SESSION["user"]["profile_image"]; ?>" alt="">
                                    <p>Karl Johnson</p>
                                </td>
                                <td class="td-internal">
                                    <p>31</p>
                                </td>
                                <td class="td-client">
                                    <p>51</p>
                                </td>
                                <td class="td-sick">
                                    <p>12</p>
                                </td>
                                <td class="td-offtime">
                                    <p>41</p>
                                </td>
                                <td>
                                    <p>65</p>
                                </td>
                            </tr>

                            <tr>
                                <td class="td-image-column">
                                    <img src="../assets/images/user/<?php echo $_SESSION["user"]["profile_image"]; ?>" alt="">
                                    <p>Karl Johnson Adkak</p>
                                </td>
                                <td class="td-internal">
                                    <p>31</p>
                                </td>
                                <td class="td-client">
                                    <p>51</p>
                                </td>
                                <td class="td-sick">
                                    <p>12</p>
                                </td>
                                <td class="td-offtime">
                                    <p>41</p>
                                </td>
                                <td>
                                    <p>65</p>
                                </td>
                            </tr>
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