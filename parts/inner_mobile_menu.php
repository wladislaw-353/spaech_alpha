</div>


    <div class="mobile-menu">
        <div data-mm-close class="dark-bg-mobile-menu"></div>
        <div class="menu-bar">
            <div class="avatar">
                <img src="img/<?=$currentUser->avatar;?>" alt="">
                <h1><?=$currentUser->login;?></h1>
            </div>
            <div class="links">
                <a href="myRating.php">
                    <span class="material-icons">favorite_border</span> My Rating</a>
                <a href="account.php">
                    <span class="material-icons">person_outline</span> Account</a>
                <a href="messanger.php">
                    <span class="material-icons">notifications_none</span> Messages</a>
                <a href="settings.php">
                    <span class="material-icons">settings</span> Settings</a>
                <a href="index.php?action=escape">
                    <span class="material-icons">exit_to_app</span> Exit</a>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/mobile-menu.js"></script>
    <script src="js/main.js"></script>
</body>
</html>