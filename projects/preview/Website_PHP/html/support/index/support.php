<?php include_once "../../include/support/support-header.php"; ?>

    <?php if(login_check($mysqli) && $_SESSION['isVerified'] == 1) { ?>
        <div class="support-content">
            <div class="create-ticket-heading">
                <h2>Erstelle ein neues Ticket</h2>
            </div>
            <div class="create-ticket-text">
                <p>Du hast Fragen rund um unser Netzwerk, hast Verbesserungsvorschläge oder möchtest unserem Team beitreten? Dann bist du hier genau richtig!</hp>
            </div>
            <div class="create-ticket-composition">
                <div class="create-ticket-image">
                    <img src="../../images/Create-Ticket-Skin.png" alt="Minecraft Skin">
                </div>
                <div class="create-ticket-button">
                    <a href="../new/createTicket.php" class="create-ticket"><i class="fas fa-pencil-alt"></i>Ticket erstellen</a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="support-content">
            Du bist nicht angemeldet oder verifiziert
        </div>
    <?php } ?>


    <script>
        document.getElementById("faq").classList.remove("active");
        if(document.getElementById("show-tickets") != null) {
            document.getElementById("show-tickets").classList.remove("active");
        }
    
        if(document.getElementById("edit-tickets") != null) {
            document.getElementById("edit-tickets").classList.remove("active");
        }

        document.getElementById("create-ticket").classList.add("active");
    </script>

 <?php include_once "../../include/support/support-footer.php"; ?>
    