<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/card.css">

<?php
    function Card(
        $cell_size, 
        $relative_directory, 
        $array_data, 
        $card_title,
        $card_icon,
        $cell_color
    ) { 
        ob_start();

        $divider_percentage = abs(
            round(($array_data["value"] / $array_data["total"]) * 100, 2)
        );

        $random_id = generateRandomID();
    ?>
        <style>
            <?php echo "#".$random_id; ?> .card-divider-custom::after {
                width: <?php echo $divider_percentage?>%;
            }
        </style>

        <div class="cell small-12 large-<?php echo $cell_size; ?> component-card" id="<?php echo $random_id; ?>">

            <div class="boxed-section <?php echo $cell_color; ?>">
                <div class="card-content">

                    <div class="title card-title section-mb">
                        <span class="card-icon">
                            <i class="fa <?php echo $card_icon; ?>"></i>
                        </span>
                        <h6><?php echo $card_title; ?></h6>
                    </div>

                    <div class="card-content">
                        <h1>
                            <?php echo $array_data["value"] . " " . $array_data["suffix"]; ?>
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