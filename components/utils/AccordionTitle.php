<?php
    function AccordionTitle($title, $content) { 
        ob_start();
    ?>
       <section class="section-accordion">
            <div class="title title-accordion">
                <h4><?php echo $title; ?></h4>
                <i class="fa fa-chevron-down"></i>
            </div>

            <div class="accordion-item section-mt-small">
                <?php echo $content; ?>
            </div>
        </section>
    <?php

        $AccordionTitle = ob_get_contents();
        ob_end_clean();

        return $AccordionTitle;
    }
?>
