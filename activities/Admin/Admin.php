<?php

namespace Admin;

use Auth\Auth;

abstract class Admin
{
    public function __construct()
    {
        $auth = new Auth();
        $auth->checkAdmin();
    }

    protected function redirect($url)
    {
        header("Location: " . trim(CURRENT_DOMAIN, '/ ') . "/" . trim($url, '/'));
        exit;
    }

    protected function back()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function saveImage($image, $imagePath, $imageName = null)
    {
        $imageTemp = $image['tmp_name'];
        $imagePath = 'public/' . trim($imagePath, '/') . '/';
        $extension = explode('/', $image['type'])[1];
        if ($imageName) {
            $imageName = $imageName . '.' . $extension;
        } else {
            $imageName = date("Y-m-d-H-i-s") . '.' . $extension;
        }
        $destination = $imagePath . $imageName;
        if (is_uploaded_file($imageTemp)) {
            if (move_uploaded_file($imageTemp, $destination)) {
                return $destination;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    protected function removeImage($imagePath)
    {
        $imagePath = BASE_PATH . '/' . trim($imagePath, '/');
        if (file_exists($imagePath))
            unlink($imagePath);
    }
}