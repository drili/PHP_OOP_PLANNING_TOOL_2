<link rel="stylesheet" href="<?php echo $relative_directory; ?>/__css/components/sidebar.css">

<div class="component-sidebar">
    <div class="sidebar-logo">
        <i class="gg-quote-o"></i>
        <h2>Zoot</h2>
    </div>

    <div class="sidebar-main-content sidebar-section">
        <h6>Main Tools</h6>
        <div class="link-section">
            <a href="<?php echo $relative_directory; ?>/views/dashboard.php"><span class="icon"><i class="fa fa-dashboard"></i></span> Dashboard</a>
            <a href="<?php echo $relative_directory; ?>/views/workflow.php"><span class="icon"><i class="fa fa-columns"></i></span> Workflow</a>
            <a href="<?php echo $relative_directory; ?>/views/sprint-overview.php"><span class="icon"><i class="fa fa-calendar"></i></span> Sprint Overview</a>
            <a href="<?php echo $relative_directory; ?>/views/time-registrations.php"><span class="icon"><i class="fa fa-clock"></i></span> Time Registrations</a>
            <a href="<?php echo $relative_directory; ?>/views/customers.php"><span class="icon"><i class="fa fa-users"></i></span> Customers</a>
        </div>
    </div>

    <div class="sidebar-secondary-content sidebar-section">
        <h6>Misc</h6>
        <div class="link-section">
            <a href="#"><span class="icon"><i class="fa fa-plus"></i></span> Campaign Planner</a>
            <a href="#"><span class="icon"><i class="fa fa-plus"></i></span> Client Health</a>
            <a href="#"><span class="icon"><i class="fa fa-plus"></i></span> Team Health</a>
        </div>
    </div>

    <div class="sidebar-profile sidebar-section">
        <div class="sidebar-profile-inner">
            <img src="<?php echo $relative_directory; ?>/assets/images/user/<?php echo $_SESSION['user']["profile_image"]; ?>" alt="">
            <div class="profile-settings">
                <h5><?php echo $_SESSION['user']["username"]; ?></h5>
            </div>
            <p><?php echo $_SESSION['user']["email"]; ?></p>
            <hr>
            <div class="profile-settings-content">
                <a href="<?php echo $relative_directory; ?>/views/profile-page.php">Edit Profile</a>
                <a href="<?php echo $relative_directory; ?>/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>