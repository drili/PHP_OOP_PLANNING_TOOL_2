<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/card.css">

<?php
    function Card(
        $cell_size, 
        $relative_directory, 
        $array_data, 
        $card_title,
        $card_icon,
        $cell_color,
        $card_height
    ) { 
        ob_start();

        if ($array_data["total"] == null || $array_data["total"] == 0) {
            $array_total = 1;
        } else {
            $array_total = $array_data["total"];
        }
        $divider_percentage = abs(
            round(($array_data["value"] / $array_total) * 100, 2)
        );

        if ($array_data["value"] == null || $array_data["value"] == 0) {
            $array_value = 0;
        } else {
            $array_value = $array_data["value"];
        }

        $random_id = generateRandomID();
    ?>
        <style>
            <?php echo "#".$random_id; ?> .card-divider-custom::after {
                width: <?php echo $divider_percentage?>%;
            }
        </style>

        <div class="cell small-12 large-<?php echo $cell_size; ?> component-card" id="<?php echo $random_id; ?>">

            <div class="boxed-section <?php echo $cell_color; ?>" style="height: <?php echo $card_height; ?>;">
                <div class="card-content">

                    <div class="title card-title section-mb">
                        <span class="card-icon">
                            <i class="fa <?php echo $card_icon; ?>"></i>
                        </span>
                        <h6><?php echo $card_title; ?></h6>
                    </div>

                    <div class="card-content">
                        <h1>
                            <?php echo $array_value . " " . $array_data["suffix"]; ?>
                        </h1>
                        <span class="card-divider-custom section-mb-small"></span>
                        <p><?php echo $divider_percentage?>% of total (<?php echo $array_data["total"]; ?>)</p>
                    </div>

                </div> <!-- .card-content -->
            </div> <!-- .boxed-section -->

        </div>
    <?php
    
        $Card = ob_get_contents();
        ob_end_clean();

        return $Card;
    }
?>