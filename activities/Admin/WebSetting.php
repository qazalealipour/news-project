<?php

namespace Admin;

use database\Database;

class WebSetting extends Admin
{
    public function index()
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting;")->fetch(); 
        require_once BASE_PATH . "/template/admin/websetting/index.php";
    }

    public function set()
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting;")->fetch();
        require_once BASE_PATH . "/template/admin/websetting/set.php";
    }

    public function store($request)
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting;")->fetch();
        if (is_uploaded_file($request['icon']['tmp_name'])) {
            if ($setting->icon) {
                $this->removeImage($setting->icon);
            }
            $request['icon'] = $this->saveImage($request['icon'], 'setting', 'icon');
        } else {
            unset($request['icon']);
        }

        if (is_uploaded_file($request['logo']['tmp_name'])) {
            if ($setting->logo) {
                $this->removeImage($setting->logo);
            }
            $request['logo'] = $this->saveImage($request['logo'], 'setting', 'logo');
        } else {
            unset($request['logo']);
        }

        $db->update('setting', array_keys($request), $request, $setting->id);
        $this->redirect('admin/websetting');
    }
}