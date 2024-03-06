<?php include_once "../../include/support/support-header.php"; ?>
<?php if(login_check($mysqli) && $_SESSION['isVerified'] == 1) { ?>
    <div class="support-content">
        Hier neues Ticket erstellen
    </div>
<?php } else {
    header("Location: ../support.php");
} ?>


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
    