<?php
    function PageTitle($title, $description) {
        return '
            <div class="grid-container-fluid grid-page-title component-page-title">
                <div class="grid-x grid-x-title">
                    <div class="cell small-12 large-6">
                        <h1>'. $title .'</h1>
                        <p>'. $description .'</p>
                    </div>
                </div>
            </div>
        ';
    }