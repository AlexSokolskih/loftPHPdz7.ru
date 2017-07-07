<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.03.2017
 * Time: 20:40
 */
use Intervention\Image\ImageManager;
class Main
{
    public static $myConfig = array('from_name' => 'приложение', 'adminEmail' => 'xaam1@ya.ru');

    public function showHeader($activPage = '')
    {
        $filelistActive = '';
        $userlistActive = '';
        $regActive = '';
        $registrationActive = '';
        switch ($activPage) {
            case 'filelist':
                $filelistActive = 'class="active"';
                break;
            case 'usersList':
                $userlistActive = 'class="active"';
                break;
            case 'reg':
                $regActive = 'class="active"';
                break;
            case 'registration':
                $registrationActive = 'class="active"';
                break;
            default:
                $mainpageActive = 'class="active"';
                break;
        }
        echo '
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Сокольских Александр</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ' . $regActive . ' ><a href="/loftscoolHomeWork-HomeWork3/reg.php">Авторизация</a></li>
            <li ' . $registrationActive . ' ><a href="/loftscoolHomeWork-HomeWork3/registration.php">Регистрация</a></li>
            <li ' . $userlistActive . ' ><a href="/loftscoolHomeWork-HomeWork3/usersList.php">Список пользователей</a></li>
            <li ' . $filelistActive . ' ><a href="/loftscoolHomeWork-HomeWork3/filelist.php">Список файлов</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>';
    }

    public function showFuter()
    {
        echo '<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>';
    }

    public function savePhoto()
    {
        // TODO! добавить ресайз изображений
        $uploaddir = '/var/www/uploads/';

        $imgdir ="assets/template/img/";
        ini_set('upload_max_filesize', '2M');
        if (empty($_FILES['userfoto'])) {
            $file = null;
        } else {
            $file = $_FILES['userfoto'];
        }

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $img_exts = ['jpeg', 'jpg', 'png', 'gif'];
        if (!in_array($extension, $img_exts)) {
            die('Это не картинка 1');
        }
        if ($file['error'] != UPLOAD_ERR_OK) {
            die('ошибка при загрузке 2');
        }
        $img_mimetype = ['png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'bmp' => 'image/bmp',
            'ico' => 'image/vnd.microsoft.icon',
            'tiff' => 'image/tiff',
            'tif' => 'image/tiff',
            'svg' => 'image/svg+xml',
            'svgz' => 'image/svg+xml'];
        if (!in_array(mime_content_type($file['tmp_name']), $img_mimetype)) {
            die ('не правильный формат файла 3');
        }
        $filename = date('U') . rand(1, 100000);
        move_uploaded_file($file['tmp_name'], $imgdir . $filename . '.' . $extension);


       /* $imageSize = getimagesize($imgdir . $filename . '.' . $extension);
        $image_p = imagecreatetruecolor($imageSize[0] - 1, $imageSize[1]);


        $image = imagecreatefromjpeg($imgdir . $filename . '.' . $extension);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $imageSize[0], $imageSize[1], $imageSize[0], $imageSize[1]);
        imagejpeg($image_p, $imgdir . $filename . '.' . $extension, 100);*/


// create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'gd'));

// to finally create image instances
        $image = $manager->make($_SERVER['DOCUMENT_ROOT'] .'/'.  $imgdir . $filename . '.' . $extension);
        $image->resize(400, 400);
        $image->save($_SERVER['DOCUMENT_ROOT'] .'/'.  $imgdir . $filename . '.' . $extension);
        return $filename . '.' . $extension;
    }

    public function cpyptPassword($password)
    {
        $criptPassword = crypt($password, '$6$naborSimvolovForSalt');
        return $criptPassword;
    }

    public function deletefileImage($filename)
    {
        unlink('photos/' . $filename);
    }
}