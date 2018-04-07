<?php include('config.php'); 
include 'library/settings.php';
ini_set('error_reporting', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function resize($file_input, $file_output, $w_o, $h_o, $percent = false) { 
    list($w_i, $h_i, $type) = getimagesize($file_input); 
    if (!$w_i || !$h_i) { 
        echo 'Невозможно получить длину и ширину изображения при уменьшении'; 
        return; 
    } 
    $types = array('','gif','jpeg','png'); 
    $ext = $types[$type]; 
    if ($ext) { 
        $func = 'imagecreatefrom'.$ext; 
        $img = $func($file_input); 
    } else { 
        echo 'Некорректный формат файла'; 
        return; 
    } 
    if ($percent) { 
        $w_o *= $w_i / 100; 
        $h_o *= $h_i / 100; 
    } 
    if (!$h_o) $h_o = $w_o/($w_i/$h_i); 
    if (!$w_o) $w_o = $h_o/($h_i/$w_i); 
    $img_o = imagecreatetruecolor($w_o, $h_o); 
    imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); 
    if ($type == 2) { 
        return imagejpeg($img_o,$file_output,100); 
    } else { 
        $func = 'image'.$ext; 
        return $func($img_o,$file_output); 
    } 
} 
?>
    <link rel="stylesheet" href="<?=$root?>assets/css/bootstrap.min.css">
    <script src="<?=$root?>assets/js/jquery.min.js"></script>
    <script src="<?=$root?>assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(function() {
    var iframe = $('#photo_frame', parent.document.body);
    iframe.height($(document.body).height());
    iframe.width($(document.body).width());
});
</script>
<br>
<form method="POST" role="form" enctype="multipart/form-data">
    <legend>Загрузка изображений</legend>

    <div class="form-group">
        <label for="file">Выберите изображение:</label>
        <input type="file" class="form-control" id="file" name="file">
    </div>
    <div class="form-group">
        <label for="s_sort">Номер сортировки:</label>
        <input type="text" class="form-control" id="s_sort" name="s_sort">
    </div>
    <?php 
    if (isset($_POST['s_sort'])) {
        $s_sort =$_POST['s_sort'];
    }
    ?>
    <div class="form-group">
        <label for="s_photo_name">Имя изображения:</label>
        <input type="text" class="form-control" id="s_photo_name" name="s_photo_name">
    </div>
    <?php 
    if (isset($_POST['s_photo_name'])) {
        $s_photo_name =$_POST['s_photo_name'];
    }
    ?>
    <div class="form-group">
        <label for="s_photo_desc">Описание оизображения:</label>
        <textarea name="s_photo_desc" id="s_photo_desc" class="form-control" rows="3" name="photo_desc"></textarea>
    </div>
    <?php 
    if (isset($_POST['s_photo_desc'])) {
        $s_photo_desc =$_POST['s_photo_desc'];
    }
    ?>

    <button type="submit" class="btn btn-primary">Добавить фото</button>
</form>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['table_name'])) {
    $table_name = $_GET['table_name'] . '_photo';
}
if (isset($table_name) && isset($_FILES['file'])) {
    define('UPLOAD_FILE', "../img/other/");
    $valid_formats = array("jpg", "JPG", "png", "gif","jpeg"); // допустимые форматы
    if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") // пришел запрос
    {
        $ph_name = $_FILES['file']['name'] ; // имя файла
        $size = $_FILES['file']['size'] ; // размер файла
        if(strlen($ph_name))
        {
            list($txt, $ext) = explode(".", $ph_name) ; // разбиваем на имя и формат
            if(in_array($ext,$valid_formats))    // смотрим формат такой как мы разрешили?!
            {
                if($size < (5000 * 1024)) // Ограничиваем размер файла в 3MB
                {
                    $actual_image_name = time() . "." . $ext ; // задаем уникальное имя файлу
                    $tmp = $_FILES['file']['tmp_name'];
                    if(move_uploaded_file($tmp, UPLOAD_FILE .  $actual_image_name)) // переносим файл с tmp в наш каталог
                    {
                        global $actual_image_name;
                        //resize('../img/other/' . $actual_image_name, '../img/other/' . $actual_image_name, '1000', '');
                    }
                    else echo "Ошибка. =(";
                }
                else echo "<h2 class='erred'>Максимальный размер файла не должен превышать 20mb</h2>";
            }
            else echo "Допустимые форматы: jpg|jpeg|png|gif)";
        }
    }else {
        $actual_image_name = '' ;
    }
    if (isset($actual_image_name)) {
        $r1 = mysqli_query($db, "INSERT INTO $table_name SET
                    sort = '$s_sort',
                    photo_name = '$s_photo_name',
                    photo_desc = '$s_photo_desc',
                    src = '$actual_image_name',
                    pp_id = '$id'");
    }
}
?>
<hr>
<?php
$r = mysqli_query($db, "SELECT * FROM $table_name WHERE pp_id = '$id' ORDER BY sort");
while ($f = mysqli_fetch_assoc($r)) { ?>
    <form method="POST" role="form">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="back_img" style="width:200px;height: 200px;background: url(../img/other/<?=$f['src']?>); background-size: cover; background-position: 50% 50%"></div>
                    <input type="hidden" name="photo_id" id="photo_id" class="form-control" value="<?=$f['photo_id']?>">
                    <input type="hidden" name="src" id="src" class="form-control" value="<?=$f['src']?>">
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="sort">Номер сортировки</label>
                                <input type="number" name="sort" id="sort" class="form-control" value="<?=$f['sort']?>">
                            </div>
                            <div class="form-group">
                                <label for="photo_name">Имя</label>
                                <input type="tel" name="photo_name" id="photo_name" class="form-control" value="<?=$f['photo_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="photo_desc">Описание</label>
                                <textarea name="photo_desc" id="photo_desc" class="form-control" rows="3"><?=$f['photo_desc']?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="sumbit" name="edit" class="btn btn-primary">Редактировать</button>
                                <button type="sumbit" name="del" class="btn btn-danger">Удалить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
if (isset($_POST['photo_id'])) {
    $photo_id = $_POST['photo_id'];
}
if (isset($_POST['sort'])) {
    $sort = $_POST['sort'];
}
if (isset($_POST['src'])) {
    $src = $_POST['src'];
}
if (isset($_POST['photo_name'])) {
    $photo_name = $_POST['photo_name'];
}
if (isset($_POST['photo_desc'])) {
    $photo_desc = $_POST['photo_desc'];
}
?>
    </form>
    <div class="clearfix">
    <hr>
    </div>
<?php } ?>


<?php
if (isset($_POST['del'])) {
    unlink('../img/other/' . $src);
    unlink('../img/other/thumb/' . $src);
    mysqli_query($db, "DELETE FROM $table_name WHERE photo_id = '$photo_id'");
    exit("<meta http-equiv='refresh' content='0; url= $_SERVER[REQUEST_URI]'>");
}
elseif (isset($_POST['edit'])) {
    mysqli_query($db, "UPDATE $table_name SET photo_name = '$photo_name', sort = '$sort', photo_desc = '$photo_desc' WHERE photo_id = '$photo_id'");
    exit("<meta http-equiv='refresh' content='0; url= $_SERVER[REQUEST_URI]'>");
}
if (isset($actual_image_name)) {
    resize('../img/other/' . $actual_image_name, '../img/other/thumb/' . $actual_image_name, '300', '');
}
?>
