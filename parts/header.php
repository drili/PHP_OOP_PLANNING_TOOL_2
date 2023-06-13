<?php
    // *** INIT session
    session_start();
    
    // *** Current directory
    $current_directory_header = dirname(__FILE__);

    // *** Include header_pre.php
    require $current_directory_header . './header_pre.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="">
        <title>:::INDEX</title>

        <!-- *** External scripts -->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        <!-- *** CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $relative_directory; ?>/__css/global.css">

        <!-- *** Zurb Foundation -->
        <!-- Compressed CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/css/foundation.min.css" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.7.5/dist/js/foundation.min.js" crossorigin="anonymous"></script>

        <!-- *** AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- *** CSS.GG -->
        <link href='https://cdn.jsdelivr.net/npm/css.gg/icons/all.css' rel='stylesheet'>

        <!-- *** jQuery Toast CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- *** Select 2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- *** Quill Rich Text -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <!-- *** jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    </head>
        <body class="<?php if(isset($_SESSION["darkmode"])) : echo ($_SESSION["darkmode"] === "darkmode") ? "darkmode" : ""; endif;?>">