<?php include_once "../../include/support/support-header.php"; ?>
<?php 
    if(login_check($mysqli)) {
        if(in_array($_SESSION['role'], $teamRoles)) { ?>
            <div class="support-content">
                Admin der Tickets bearbeiten kann
            </div>  
<?php   } else {
            header("location: ../index/support.php");
        }
    } else {
        header("location: ../index/support.php");
    }
?>

<script>
    document.getElementById("create-ticket").classList.remove("active");
    document.getElementById("faq").classList.remove("active");
    document.getElementById("show-tickets").classList.remove("active");

    document.getElementById("edit-tickets").classList.add("active");
</script>

 <?php include_once "../../include/support/support-footer.php"; ?>
