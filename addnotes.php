<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- <link rel="icon" type="image/vnd.microsoft.icon" href="img/icons/favicon.ico"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
    <title>Главная</title>
</head>
<body>
    
    <nav>
        <div class="avatar">
            <img src="img/img.jpg" alt="">
            <h1>Alex</h1>
        </div>
        <div class="links">
            <a href="#"><span class="material-icons">favorite_border</span> My Rating</a>
            <a href="#"><span class="material-icons">person_outline</span> Account</a>
            <a href="#"><span class="material-icons">notifications_none</span> Notification</a>
            <a href="#"><span class="material-icons">settings</span> Settings</a>
            <a href="#"><span class="material-icons">exit_to_app</span> Exit</a>
        </div>
    </nav>

    <div class="content-wrapper">
        <header>
            <div class="header-notes">
                <div class="holder">
                    <div class="name-notes">
                        <a href="#"><span class="material-icons">keyboard_arrow_left</span></a>
                        <a href="#"><p>Natali</p></a>
                   </div>
                   <div class="edit-notes">
                     <form action="">
                       <input type="submit" value="CANCEL" >
                       <input type="submit" value="SAVE" >
                     </form> 
                   </div>
                </div>
            </div>
        
           <!--  <div class="tabs">
                <div class="" id="btn-contacs">contacts</div>
                <div class="active" id="btn-categories">categories</div>
            </div> -->
        </header>
        
        <article>
            <div class="holder">
                <div class="form-notes">
                   <form action="">
                     <div class="addinput input-group">
                     <input type="text" id="" placeholder="Header">
                     <input type="text" id="" placeholder="Text">
                     </div>
                   </form>
                </div>
            </div>
        </article>
        
        <!-- тут должен быть футер -->
    </div>

    <div class="mobile-menu">
        <div data-mm-close class="dark-bg-mobile-menu"></div>
        <div class="menu-bar">
            <div class="avatar">
                <img src="img/img.jpg" alt="">
                <h1>Alex</h1>
            </div>
            <div class="links">
                <a href="#">
                    <span class="material-icons">favorite_border</span> My Rating</a>
                <a href="#">
                    <span class="material-icons">person_outline</span> Account</a>
                <a href="#">
                    <span class="material-icons">notifications_none</span> Notification</a>
                <a href="#">
                    <span class="material-icons">settings</span> Settings</a>
                <a href="#">
                    <span class="material-icons">exit_to_app</span> Exit</a>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/mobile-menu.js"></script>
    <script src="js/main.js"></script>
</body>
</html>