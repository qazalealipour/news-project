<?php

namespace Admin;

use database\Database;

class User extends Admin
{
    public function index()
    {
        $db = new Database();
        $users = $db->select("SELECT * FROM users ORDER BY id DESC")->fetchAll();
        require_once BASE_PATH . '/template/admin/user/index.php';
    }

    public function destroy($id)
    {
        $db = new Database();
        $db->delete('users', $id);
        $this->back();
    }

    public function permission($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM users WHERE id = ?", [$id])->fetch();
        if ($user->permission == 'admin') {
            $db->update('users', ['permission'], ['user'], $id);
        } else {
            $db->update('users', ['permission'], ['admin'], $id);
        }
        $this->back();
    }
}