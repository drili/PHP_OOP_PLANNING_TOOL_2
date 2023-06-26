<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/content-navigation.css">

<?php
    function PageContentNavigation($cell_size, $cell_offset, $relative_directory, $component_nav) {
        ob_start();
    ?>
        <div class="cell small-12 large-<?php echo $cell_size; ?> large-offset-<?php echo $cell_offset; ?> component-page-content-navigation">
            <div class="boxed-section boxed-section-gray">
                <div class="title">
                    <h4>Page Content Navigation</h4>
                    <hr>
                </div>

                <div class="nav-content">

                </div>
            </div>
    
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const component = "<?php echo $component_nav; ?>";
                const componentElement = document.querySelector(`.${component}`);

                const navigationLinks = [];

                navigations = componentElement.querySelectorAll(".title");
                navigations.forEach(function(nav) {
                    const navTitle = nav.querySelector(".title h4").innerHTML;
                    const cleanedNavTitle = navTitle.replace(/[^\w\s]/gi, '').replace(/\s+/g, '');

                    nav.querySelector(".title h4").setAttribute("id", cleanedNavTitle);
                    
                    navigationLinks.push({cleanedNavTitle, navTitle});
                })

                console.log({navigationLinks});

                if (navigationLinks) {
                    const navContentElement = document.querySelector(`.nav-content`);
                    var navIterator = 1;

                    navigationLinks.forEach(function(navLink) {
                        // navContentElement.append(`<a href="${navLinks}">${navLinks}</a>`);
                        const { cleanedNavTitle, navTitle } = navLink;
                        navContentElement.insertAdjacentHTML('beforeend', `<a href="#${cleanedNavTitle}">${navIterator}. ${navTitle}</a>`);

                        navIterator++;
                    })
                }
            })
        </script>
    <?php

        $PageContentNavigation = ob_get_contents();
        ob_end_clean();

        return $PageContentNavigation;
    }
?>