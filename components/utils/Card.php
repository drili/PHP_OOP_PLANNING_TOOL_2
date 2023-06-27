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
    ?>
        <div class="cell small-12 large-<?php echo $cell_size; ?> component-card">

            <div class="boxed-section <?php echo $cell_color; ?>">
                <div class="card-content">

                    <div class="title card-title section-mb">
                        <span class="card-icon">
                            <i class="fa <?php echo $card_icon; ?>"></i>
                        </span>
                        <h6><?php echo $card_title; ?></h6>
                    </div>

                    <div class="card-content">
                        <h1>0 Hours</h1>
                        <span class="card-divider-custom section-mb-small"></span>
                        <p>50% of total (100)</p>
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