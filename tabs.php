<?
session_start();
if(!isset($_SESSION['user'])){
	session_destroy();
	header('Location: /index.php');
}
include 'config.php';
include 'library/main.php';
$currentUser = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- <link rel="icon" type="image/vnd.microsoft.icon" href="img/icons/favicon.ico"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
	<link rel="stylesheet" href="/css/modals.css">
    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/media.css">
    <title>Account</title>
</head>
<body>

    <nav>
        <div class="avatar">
            <img src="img/<?=$currentUser->avatar;?>" alt="">
            <h1><?=$currentUser->login;?></h1>
        </div>
        <div class="links">
            <a href="myRating.php"><span class="material-icons">favorite_border</span> My Rating</a>
            <a href=""><span class="material-icons">person_outline</span> Account</a>
            <a href="#"><span class="material-icons">notifications_none</span> Notification</a>
            <a href="settings.php"><span class="material-icons">settings</span> Settings</a>
            <a href="index.php?action=escape"><span class="material-icons">exit_to_app</span> Exit</a>
        </div>
    </nav>

    <div class="content-wrapper">

            <header>
                <div class="header-nav">
                    <div class="holder">
                        <a href="myRating.php" class="back-link">
                            <span class="material-icons">keyboard_arrow_left</span>
                        </a>
                        <span class="title">Account</span>
                    </div>
                </div>
                <div class="tabs">
                    <div class="tab active" id="btn-photo">PHOTO</div>
                    <div class="tab" id="btn-video">VIDEO</div>
                    <div class="tab" id="btn-notes">NOTES</div>
                </div>
        </header>

        <article>

            <div class="holder">
                <div class="tab-content">
                    <div class="tab-item">
                        <div class="library">
                            <a href="img/ava1.jpg"  class="item"><img src="img/ava1.jpg" alt=""></a>
                            <a href="img/ava1.jpg" class="item"><img src="img/ava1.jpg" alt=""></a>
                            <a href="img/ava1.jpg" class="item"><img src="img/ava1.jpg" alt=""></a>
                            <a href="img/ava1.jpg" class="item"><img src="img/ava1.jpg" alt=""></a>
                            <a href="img/ava1.jpg" class="item"><img src="img/ava1.jpg" alt=""></a>
                            <a href="img/ava1.jpg" class="item"><img src="img/ava1.jpg" alt=""></a>
                        </div>
                    <div class="add">
                        <a href="#"><span class="material-icons">add</span></a>
                    </div>
                    </div>

                    <div class="tab-item">
                      <div class="video-item">
                          <div class="video-box">
                             <iframe width="100%" height="500px" src="https://www.youtube.com/embed/F5JzT1ZRxoY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                          </div>
                          <div class="video-content">
                              <p>Video Natali</p>
                                <span class="material-icons more" data-edit-open>more_vert</span>
                                 <div class="edit-mask">
                                  <div class="btn-wrapper">
                                      <span class="material-icons">edit</span>
                                     <span>Edit</span>
                                  </div>
                                  <div class="btn-wrapper">
                                      <span class="material-icons">delete</span>
                                      <span>Delete</span>
                                  </div>
                                  <span class="material-icons more" data-edit-close>more_vert</span>
                                </div>
                              <div class="video-date">
                                  12.10.2016
                              </div>
                          </div>
                          <hr>
                      </div>
                      <div class="video-item">
                          <div class="video-box">
                             <iframe width="100%" height="500px" src="https://www.youtube.com/embed/F5JzT1ZRxoY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                          </div>
                          <div class="video-content">
                              <p>Video Natali</p>
                                <span class="material-icons more" data-edit-open>more_vert</span>
                                 <div class="edit-mask">
                                  <div class="btn-wrapper">
                                      <span class="material-icons">edit</span>
                                     <span>Edit</span>
                                  </div>
                                  <div class="btn-wrapper">
                                      <span class="material-icons">delete</span>
                                      <span>Delete</span>
                                  </div>
                                  <span class="material-icons more" data-edit-close>more_vert</span>
                                </div>
                              <div class="video-date">
                                  12.10.2016
                              </div>
                          </div>
                          <hr>
                      </div>
                     <div class="add">
                        <a href="#"><span class="material-icons">add</span></a>
                    </div>
                   </div>

                     <div class="tab-item">
                        <div class="notes-box">
                            <div class="notes-content">
                                <span class="material-icons more" data-edit-open>more_vert</span>
                                 <div class="edit-mask">
                                  <div class="btn-wrapper">
                                      <span class="material-icons">edit</span>
                                     <span>Edit</span>
                                  </div>
                                  <div class="btn-wrapper">
                                      <span class="material-icons">delete</span>
                                      <span>Delete</span>
                                  </div>
                                  <span class="material-icons more" data-edit-close>more_vert</span>
                                </div>
                                 <h2>Beautiful evening</h2>
                                 <p>A beautiful evening small background music given by me which feels very romantic and clam moments it is in movie safe heaven and  video describes my music
Please listen in headphone for good experience</p>
                            </div>
                            <div class="notes-data_time">
                                <span class="notes-time">12:15</span>
                                <span class="notes-date">13:12:2016</span>
                            </div>
                        </div>
                          <div class="notes-box">
                            <div class="notes-content">
                                <span class="material-icons more" data-edit-open>more_vert</span>
                                 <div class="edit-mask">
                                  <div class="btn-wrapper">
                                      <span class="material-icons">edit</span>
                                     <span>Edit</span>
                                  </div>
                                  <div class="btn-wrapper">
                                      <span class="material-icons">delete</span>
                                      <span>Delete</span>
                                  </div>
                                  <span class="material-icons more" data-edit-close>more_vert</span>
                                </div>
                                 <h2>Beautiful evening</h2>
                                 <p>A beautiful evening small background music given by me which feels very romantic and clam moments it is in movie safe heaven and  video describes my music
Please listen in headphone for good experience</p>
                            </div>
                            <div class="notes-data_time">
                                <span class="notes-time">12:15</span>
                                <span class="notes-date">13:12:2016</span>
                            </div>
                        </div>
                    <div class="add">
                        <a href="#"><span class="material-icons">add</span></a>
                    </div>
                    </div>
                </div>
            </div>
        </article>


        <!--     -->
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
                <a href="">
                    <span class="material-icons">person_outline</span> Account</a>
                <a href="#">
                    <span class="material-icons">notifications_none</span> Notification</a>
                <a href="settings.php">
                    <span class="material-icons">settings</span> Settings</a>
                <a href="index.php?action=escape">
                    <span class="material-icons">exit_to_app</span> Exit</a>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mobile-menu.js"></script>
    <script src="js/main.js"></script>
</body>
</html>