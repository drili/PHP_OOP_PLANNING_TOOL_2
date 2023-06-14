<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/topbar.css">

<div class="component-topbar">
    <div class="topbar-content">
        
        <div class="search-section">
            <form action="POST" action="" id="searchForm">
                <input type="search" placeholder="Search">
                <i class="fa fa-search"></i>
            </form>
        </div>
        
        <div class="topbar-content-inner">
            <div class="info-section">
                <p>January 2023 <i class="fa fa-briefcase-clock"></i></p>
            </div>
            
            <div class="buttons-section">
                <a href="#" class="btn btn-small btn-secondary">
                    Register Offtime <i class="fa fa-calendar-check"></i>
                </a>

                <a href="#" class="btn btn-small btn-primary">
                    Create Task <i class="fa fa-plus"></i>
                </a>
            </div>

            <div class="darkmode-section">
                <label class="switch">
                    <input type="checkbox" id="darkModeSwitch">
                    <span class="slider-custom round">
                        <i class="fa fa-moon"></i>
                        <i class="fa fa-sun"></i>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo $relative_directory; ?>/__js/components/topbar.js"></script>