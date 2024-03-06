<?php include_once "../../include/support/support-header.php"; ?>
    <?php if(login_check($mysqli) && $_SESSION['isVerified'] == 1) { ?>
        <div class="support-content">
            Hier findest du deine eigenen Tickets
        </div>
    <?php } else {
        header("location: support.php");
    } ?>

<script>
    document.getElementById("create-ticket").classList.remove("active");
    document.getElementById("faq").classList.remove("active");
    if(document.getElementById("edit-tickets") != null) {
        document.getElementById("edit-tickets").classList.remove("active");
    }

    document.getElementById("show-tickets").classList.add("active");
</script>

 <?php include_once "../../include/support/support-footer.php"; ?>
    