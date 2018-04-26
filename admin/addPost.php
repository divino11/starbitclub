<?php
session_start();
require_once '../db.php';
mysqli_set_charset($link, 'utf8');

if (isset($_POST['add-post']) && $_POST['selectPost'] == 'news') {
// проверяем, что есть файл
    if ((!empty($_FILES["myfiles"])) && ($_FILES['myfiles']['error'] == 0)) {
        // проверяем, что файл это изображение JPEG и его размер не больше 350кб
        $filename = basename($_FILES['myfiles']['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        if (($ext == "jpg") && ($_FILES["myfiles"]["type"] == "image/jpeg") &&
            ($_FILES["myfiles"]["size"] < 999000000000)) {
            // путь для сохранения файла
            $newname = '../news-img/' . $filename;
            // проверяем, файл с таким названием уже есть на сервере
            if (!file_exists($newname)) {
                // переместить загруженный файл в новое место
                if ((move_uploaded_file($_FILES['myfiles']['tmp_name'], $newname))) {
                    $message_success = "Прелестно, статья была добавлена";
                    $title = $_POST['title'];
                    $short_text = $_POST['short_text'];
                    $text = $_POST['text'];
                    $select_category = join(", ",$_POST['select_category']);
                    $author = $_POST['author'];
                    $file = $_FILES["myfiles"]["name"];
                    $sql = mysqli_query($link, "INSERT INTO `news` (`type`, `title`, `img`, `category`, `short_text`, `text`, `author`, `mainPost`) 
                        VALUES ('Новости', '$title', '$file', '$select_category', '$short_text', '$text', '$author', '0')");
                } else {
                    $message_error = "Произошла ошибка при загрузке файла!";
                }
            } else {
                $message_error = "Ошибка: файл " . $_FILES["myfiles"]["name"] . " уже существует";
            }
        } else {
            $message_error = "Ошибка при загрузке файла, изображение не .jpg или больше чем 350кб.";
        }
    } else {
        $message_error = "Ошибка: файл не загружен!";
    }
} elseif (isset($_POST['add-post']) && $_POST['selectPost'] == 'article') {
    // проверяем, что есть файл
    if ((!empty($_FILES["myfiles"])) && ($_FILES['myfiles']['error'] == 0)) {
        // проверяем, что файл это изображение JPEG и его размер не больше 350кб
        $filename = basename($_FILES['myfiles']['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        if (($ext == "jpg") && ($_FILES["myfiles"]["type"] == "image/jpeg") &&
            ($_FILES["myfiles"]["size"] < 999000000000)) {
            // путь для сохранения файла
            $newname = '../news-img/' . $filename;
            // проверяем, файл с таким названием уже есть на сервере
            if (!file_exists($newname)) {
                // переместить загруженный файл в новое место
                if ((move_uploaded_file($_FILES['myfiles']['tmp_name'], $newname))) {
                    $message_success = "Прелестно, новость была добавлена";
                    $title = $_POST['title'];
                    $short_text = $_POST['short_text'];
                    $text = $_POST['text'];
                    $select_category = join(",",$_POST["select_category"]);
                    $author = $_POST['author'];
                    $file = $_FILES["myfiles"]["name"];
                    $sql = mysqli_query($link, "INSERT INTO `article` (`type`, `title`, `img`, `category`, `short_text`, `text`, `author`, `mainPost`) 
                        VALUES ('Статья', '$title', '$file', '$select_category', '$short_text', '$text', '$author', '0')");
                } else {
                    $message_error = "Произошла ошибка при загрузке файла!";
                }
            } else {
                $message_error = "Ошибка: файл " . $_FILES["myfiles"]["name"] . " уже существует";
            }
        } else {
            $message_error = "Ошибка при загрузке файла, изображение не .jpg или больше чем 350кб.";
        }
    } else {
        $message_error = "Ошибка: файл не загружен!";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="../js/device.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="chosen/docsupport/style.css">
    <link rel="stylesheet" href="chosen/docsupport/prism.css">
    <link rel="stylesheet" href="chosen/chosen.css">
    <title>Админ-панель | Добавить новость</title>
</head>
<body>
<div class="reg-page">
    <?php require_once "../template/menu-admin.php"; ?>
</div>
<div class="form-reg">
    <div class="container">
        <div class="form-white-reg">
            <div class="admin-add-post">
                <div class="row">
                    <div class="col-md-6">
                        <form action="addPost" method="post" enctype="multipart/form-data">
                            <input type="text" required class="field-add-post" name="title"
                                   placeholder="Заголовок новости">
                            <p class="label__info">Короткий текст</p>
                            <textarea required class="field-add-post" name="short_text"
                                      placeholder="Короткий текст новости"></textarea>
                            <p class="label__info">Полный текст</p>
                            <textarea id="editor2" required class="field-add-post" name="text"
                                      placeholder="Полный текст новости"></textarea>
                            <select data-placeholder="Выберите категорию" name="select_category[]" class="select_category" multiple>
                                <option value=""></option>
                                <?php
                                $sql = "SELECT * FROM `category` ORDER BY id DESC";
                                mysqli_set_charset($link, 'utf8');
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                    $category = $row['category']
                                    ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                <?php } ?>
                            </select>
                            <select required class="field-add-post" name="author" id="">
                                <option value="Алексей">Алексей</option>
                                <option value="Денис">Денис</option>
                            </select>
                            <input type="file" class="field-add-post" name="myfiles" placeholder="Картинка">
                            <select name="selectPost" class="select_category">
                                <option value="news">Новость</option>
                                <option value="article">Статья</option>
                            </select>
                            <button class="add-post btn-success" name="add-post">Добавить</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="addCategory" class="btn-success btn-post">Добавить категорию</a>
                        <p class="message-success"><?php echo $message_success; ?></p>
                        <p class="message-error"><?php echo $message_error; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="editor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('editor2');
</script>
<script src="chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
<script>
    $('.select_category').chosen();
    $('.select_category').change(function () {

    });
    $('.select_category').trigger("liszt:updated");
</script>
</body>
</html>
