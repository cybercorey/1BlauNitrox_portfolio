<?php include_once "../../include/support/support-header.php"; ?>

    <div class="support-content">
        Hier sind die FAQs
    </div>

    <script>
        document.getElementById("create-ticket").classList.remove("active");
        if(document.getElementById("show-tickets") != null) {
            document.getElementById("show-tickets").classList.remove("active");
        }

        if(document.getElementById("edit-tickets") != null) {
            document.getElementById("edit-tickets").classList.remove("active");
        }

        document.getElementById("faq").classList.add("active");
    </script>

 <?php include_once "../../include/support/support-footer.php"; ?>
    