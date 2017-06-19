<?php

/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 17.04.2017
 * Time: 21:49
 */
use Intervention\Image\ImageManager;

class Model_files extends Model
{
    public function changeImage()
    {


// create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'gd'));

// to finally create image instances
        $image = $manager->make($_SERVER['DOCUMENT_ROOT'] . '/assets/template/img/' . $_POST["imageFile"]);
        $image->rotate(-180);
        $image->resize(200);

        $image->text('watermark watermark watermark watermark ', 10, 100, function ($font) {
            $font->size(500);
            $font->color('#ff0000');
            $font->angle(45);
        });
        $image->save($_SERVER['DOCUMENT_ROOT'] . '/assets/template/img/' . $_POST["imageFile"]);
        echo($_SERVER['DOCUMENT_ROOT'] . '/assets/template/img/' . $_POST["imageFile"]);
        var_dump($_POST);
    }

    public function get_data()
    {
        if ($_POST["imageFile"] != '') {
            $this->changeImage();
        }
        $filesList = scandir('assets/template/img/');
        $fileNameArray = array_slice($filesList, 2);

        return $fileNameArray;
    }
}