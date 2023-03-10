<?php

namespace Admin;

use database\Database;

class Banner extends Admin
{
    public function index()
    {
        $db = new Database();
        $banners = $db->select("SELECT * FROM banners ORDER BY id DESC;")->fetchAll();
        require_once BASE_PATH . "/template/admin/banner/index.php";
    }

    public function create()
    {
        $db = new Database();
        require_once BASE_PATH . "/template/admin/banner/create.php";
    }

    public function store($request)
    {
        $db = new Database();
        $request['image'] = $this->saveImage($request['image'], 'banner');
        if ($request['image']) {
            $db->insert('banners', array_keys($request), $request);
            $this->redirect('admin/banner');
        } else {
            $this->back();
        }
    }

    public function edit($id)
    {
        $db = new Database();
        $banner = $db->select("SELECT * FROM banners WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . "/template/admin/banner/edit.php";
    }

    public function update($request, $id)
    {
        $db = new Database();
        if (is_uploaded_file($request['image']['tmp_name'])) {
            $banner = $db->select("SELECT * FROM banners WHERE id = ?", [$id])->fetch();
            $this->removeImage($banner->image);
            $request['image'] = $this->saveImage($request['image'], 'banner');
            if (!$request['image']) {
                $this->back();
            }
        } else {
            unset($request['image']);
        }
        $db->update('banners', array_keys($request), $request, $id);
        $this->redirect('admin/banner');
    }

    public function destroy($id)
    {
        $db = new Database();
        $banner = $db->select("SELECT * FROM banners WHERE id = ?", [$id])->fetch();
        $this->removeImage($banner->image);
        $db->delete('banners', $id);
        $this->back();
    }
}
