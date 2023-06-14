<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/sidebar.css">

<div class="component-sidebar">
    <div class="sidebar-logo">
        <i class="gg-quote-o"></i>
        <h2>Zoot</h2>
    </div>

    <div class="sidebar-main-content sidebar-section">
        <h6>Main Tools</h6>
        <div class="link-section">
            <a href="#" class="link-active"><span class="icon"><i class="gg-ghost"></i></span> Dashboard</a>
            <a href="#"><span class="icon"><i class="gg-display-spacing"></i></span> Workflow</a>
            <a href="#"><span class="icon"><i class="gg-calendar-today"></i></span> Sprint Overview</a>
            <a href="#"><span class="icon"><i class="gg-sand-clock"></i></span> Time Registrations</a>
            <a href="#"><span class="icon"><i class="gg-user-list"></i></span> Customers</a>
        </div>
    </div>

    <div class="sidebar-secondary-content sidebar-section">
        <h6>Misc</h6>
        <div class="link-section">
            <a href="#"><span class="icon"><i class="gg-band-aid"></i></span> Campaign Planner</a>
            <a href="#"><span class="icon"><i class="gg-band-aid"></i></span> Client Health</a>
            <a href="#"><span class="icon"><i class="gg-band-aid"></i></span> Team Health</a>
        </div>
    </div>

    <div class="sidebar-profile sidebar-section">
        <div class="sidebar-profile-inner">
            <img src="<?php echo $relative_directory; ?>/assets/images/user/default-profile.jpg" alt="">
            <h5><?php echo $_SESSION['user']["username"]; ?></h5>
            <p><?php echo $_SESSION['user']["email"]; ?></p>
        </div>
    </div>
</div>