<?php
include_once '../../include/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="../../css/global.css">
        <link rel="stylesheet" href="../../css/support.css">
        <link rel="icon" href="../../images/icon.png">

        <title>Lyrotopia.net | Support</title>

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body onresize="checkResize()">

        <?php include_once '../../include/navigation.php'; ?>

 
        <div class="container">
            <div class="overview">
                <ul class="support-navigation">
                    <li id="create-ticket" class="support-navigation-item active"><a href="../index/support.php"><i class="fas fa-pencil-alt" id="support-nav-icon"></i>Ticket erstellen</a></li>
                    <?php if(login_check($mysqli)) { ?>
                        <li id="show-tickets" class="support-navigation-item"><a href="../index/tickets.php"><i class="fas fa-ticket-alt" id="support-nav-icon"></i>Deine Tickets</a></li>
                    <?php } ?>
                    <li id="faq" class="support-navigation-item"><a href="../index/faq.php"><i class="fas fa-comments" id="support-nav-icon"></i>FAQ</a></li>
                    <?php if(login_check($mysqli)) { 
                            if(in_array($_SESSION['role'], $teamRoles)) { ?>
                        <li id="edit-tickets" class="support-navigation-item"><a href="../edit/tickets.php"><i class="fas fa-edit" id="support-nav-icon"></i>Tickets bearbeiten</a></li>
                    <?php    }
                          } ?>
                </ul>
            </div>
            <div class="support-section">
