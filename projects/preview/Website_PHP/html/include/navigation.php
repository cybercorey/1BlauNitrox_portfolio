<!--  Fullsite Navigation  --> 

<nav role="navigation" id="navigation">
    <div class="icon-container">
        <img src="images/icon.png" alt="Icon" id="icon">
        <p id="icon-title">Lyrotopia.net</p>
    </div>
    <ul class="nav-items">
        <li class="nav-item" id="home"><a href="index.php"><i class="fas fa-home" id="nav-icon"></i>Home</a></li>
        <li class="nav-item" id="games"><a href="spiele.php"><i class="fas fa-gamepad" id="nav-icon"></i>Spiele</a></li>
        <li class="nav-item" id="statistics"><a href="statistics.php"><i class="fas fa-chart-line" id="nav-icon"></i>Statistiken</a></li>
        <li class="nav-item" id="status"><a href="status.php"><i class="fas fa-server" id="nav-icon"></i>Status</a></li>
        <li class="nav-item" id="team"><a href="team.php"><i class="fas fa-users" id="nav-icon"></i>Team</a></li>
        <li class="nav-item" id="support"><a href="support/index/support.php"><i class="fas fa-question-circle" id="nav-icon"></i>Support</a></li>
        <li class="nav-item last-nav-item" id="forum"><a href="https://forum.lyrotopia.net"><i class="fas fa-comments" id="nav-icon"></i>Forum</a></li>
        
        <?php if(login_check($mysqli) == true) { ?>
            <li class="nav-item" id="profile"><a href="profile.php"><i class="fas fa-user" id="nav-icon"></i>Account</a></li>
        <?php } else { ?>
            <li class="nav-item" id="login"><a href="login.php"><i class="fas fa-sign-in-alt" id="nav-icon"></i>Anmelden</a></li>
        <?php } ?>
    </ul>
</nav>

<!--  Collapsed Navigation  --> 

<nav role="navigation" id="navigation-collapsed" class="navigation-collapsed">
    <img src="images/icon.png" alt="Icon" class="nav-icon-collapsed" id="icon">
    <hr class="nav-hr-collapsed">
    <ul class="nav-items-collapsed">
        <li class="nav-item-collapsed" id="home"><a href="index.php"><i class="fas fa-home" id="nav-icon-collapsed"></i>Home</a></li>
        <li class="nav-item-collapsed" id="games"><a href="spiele.php"><i class="fas fa-gamepad" id="nav-icon-collapsed"></i>Spiele</a></li>
        <li class="nav-item-collapsed" id="statistics"><a href="statistics.php"><i class="fas fa-chart-line" id="nav-icon-collapsed"></i>Statistiken</a></li>
        <li class="nav-item-collapsed" id="status"><a href="status.php"><i class="fas fa-server" id="nav-icon-collapsed"></i>Status</a></li>
        <li class="nav-item-collapsed" id="team"><a href="team.php"><i class="fas fa-users" id="nav-icon-collapsed"></i>Team</a></li>
        <li class="nav-item-collapsed" id="support"><a href="support.php"><i class="fas fa-question-circle" id="nav-icon-collapsed"></i>Support</a></li>
        <li class="nav-item-collapsed" id="forum"><a href="https://forum.lyrotopia.net"><i class="fas fa-comments" id="nav-icon-collapsed"></i>Forum</a></li>
    </ul>
    <ul class="nav-items-collapsed">
        <!--<li class="nav-item" id="datenschutz"><a href="index.php"><i class="fas fa-shield-alt" id="nav-icon"></i>Datenschutz</a></li>
        <li class="nav-item" id="imprint"><a href="index.php"><i class="fas fa-pager" id="nav-icon"></i>Impressum</a></li>
        <li class="nav-item" id="agb"><a href="index.php"><i class="fas fa-database" id="nav-icon"></i>Agb</a></li>-->
        <?php if(login_check($mysqli) == true) { ?>
            <li class="nav-item-collapsed" id="profile"><a href="profile.php"><i class="fas fa-user" id="nav-icon-collapsed"></i>Account</a></li>
            <li class="nav-item-collapsed" id="logout"><a href="include/logout_verarbeitung.php"><i class="fas fa-sign-out-alt" id="nav-icon-collapsed"></i>Abmelden</a></li>
        <?php } else { ?>
            <li class="nav-item-collapsed" id="login"><a href="login.php"><i class="fas fa-sign-in-alt" id="nav-icon-collapsed"></i>Anmelden</a></li>
        <?php } ?>
    </ul>
</nav>

<div class="menu" id="menu" onclick="toggle()">
    <a id="menu-open"><i class="fa fa-bars"></i></a>
    <a id="menu-close"><i class="fas fa-times"></i></a>
</div>