<?php

namespace App\services;

use Exception;

class PictureService
{
    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function addCover($picture, ?string $folder = '')
    {
        $file = md5(uniqid(rand(), true)) . '.webp';

        $pictureInfos = getimagesize($picture['tmp_name']);

        if ($pictureInfos === false) {
            throw new Exception('Format d\'image incorrect');
        }

        switch ($pictureInfos['mime']){
            case 'image/png':
                $pictureSource = \imagecreatefrompng($picture['tmp_name']);
                break;
            case 'image/jpeg':
            case 'image/jpg':
                $pictureSource = imagecreatefromjpeg($picture['tmp_name']);
                break;
            case 'image/webp':
                $pictureSource = imagecreatefromwebp($picture['tmp_name']);
                break;
            case 'image/gif':
                $pictureSource = imagecreatefromgif($picture['tmp_name']);
                break;
            default:
                throw new Exception('Format d\'image incorrect');
        }

        $path = $this->params['images_directory'] . $folder;

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        imagewebp($pictureSource, $path . '/' .  $file);

        imagedestroy($pictureSource);

        return $file;
    }
}