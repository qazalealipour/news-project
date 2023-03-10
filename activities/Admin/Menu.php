<?php

namespace Admin;

use database\Database;

class Menu extends Admin
{
    public function index()
    {
        $db = new Database();
        $menus = $db->select("SELECT menu.*, submenu.name AS submenuName FROM menus menu LEFT JOIN menus submenu ON menu.parent_id = submenu.id ORDER BY id DESC;")->fetchAll();
        require_once BASE_PATH . '/template/admin/menu/index.php';
    }

    public function create()
    {
        $db = new Database();
        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL;")->fetchAll();
        require_once BASE_PATH . '/template/admin/menu/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $db->insert('menus', array_keys(array_filter($request)), array_filter($request));
        $this->redirect('admin/menu');
    }

    public function edit($id)
    {
        $db = new Database();
        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL;")->fetchAll();
        $menu = $db->select("SELECT * FROM menus WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/menu/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $db->update('menus', array_keys($request), $request, $id);
        $this->redirect('admin/menu');
    }

    public function destroy($id)
    {
        $db = new Database();
        $db->delete('menus', $id);
        $this->back();
    }
}