                </div>
            </div>
        </div>

        <?php include_once '../../include/footer.php'; ?>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../../scripts/cookies.js"></script>
        <script src="../../scripts/support.js"></script>
        <script src="../../scripts/scripts.js"></script>
        <script>
            document.getElementById('support').classList.add('active');
            document.getElementById('navigation').style.background = "#75d375";
            editNavLinks(<?php echo login_check($mysqli); ?>);
        </script>
    </body>
</html>