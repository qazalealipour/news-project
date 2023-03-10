<?php

namespace Admin;

use database\Database;

class Post extends Admin
{
    public function index()
    {
        $db = new Database();
        $posts = $db->select("SELECT posts.*, users.username AS userName, categories.name AS categoryName FROM posts LEFT JOIN users ON posts.user_id = users.id LEFT JOIN categories ON posts.cat_id = categories.id ORDER BY id DESC;")->fetchAll();
        require_once BASE_PATH . "/template/admin/post/index.php";
    }

    public function create()
    {
        $db = new Database();
        $categories = $db->select("SELECT * FROM categories ORDER BY id DESC;")->fetchAll();
        require_once BASE_PATH . "/template/admin/post/create.php";
    }

    public function store($request)
    {
        $db = new Database();
        $realTimestamp = substr($request['published_at'], 0, 10);
        $request['published_at'] = date("Y-m-d H:i:s", (int) $realTimestamp);
        if ($request['cat_id']) {
            $request['image'] = $this->saveImage($request['image'], 'post-image');
            if ($request['image']) {
                $request = array_merge($request, ['user_id' => $_SESSION['user']]);
                $db->insert('posts', array_keys($request), $request);
                $this->redirect('admin/post');
            } else {
                $this->back();
            }
        } else {
            $this->back();
        }
    }

    public function show($id)
    {
        $db = new Database();
        $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
        $categories = $db->select("SELECT * FROM categories ORDER BY id DESC;")->fetchAll();
        require_once BASE_PATH . "/template/admin/post/show.php";
    }

    public function edit($id)
    {
        $db = new Database();
        $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
        $categories = $db->select("SELECT * FROM categories ORDER BY id DESC;")->fetchAll();
        require_once BASE_PATH . "/template/admin/post/edit.php";
    }

    public function update($request, $id)
    {
        $db = new Database();
        $realTimestamp = substr($request['published_at'], 0, 10);
        $request['published_at'] = date("Y-m-d H:i:s", (int) $realTimestamp);
        if ($request['cat_id']) {
            if (is_uploaded_file($request['image']['tmp_name'])) {
                $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
                $this->removeImage($post->image);
                $request['image'] = $this->saveImage($request['image'], 'post-image');
                if (!$request['image']) {
                    $this->back();
                }
            } else {
                unset($request['image']);
            }
            $db->update('posts', array_keys($request), $request, $id);
            $this->redirect('admin/post');
        } else {
            $this->back();
        }
    }

    public function destroy($id)
    {
        $db = new Database();
        $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
        $this->removeImage($post->image);
        $db->delete('posts', $id);
        $this->back();
    }

    public function breakingNews($id)
    {
        $db = new Database();
        $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
        if (empty($post)) {
            $this->back();
        }
        if ($post->breaking_news == 1) {
            $db->update('posts', ['breaking_news'], [0], $id);
        } else {
            $db->update('posts', ['breaking_news'], [1], $id);
        }
        $this->back();
    }

    public function selected($id)
    {
        $db = new Database();
        $post = $db->select("SELECT * FROM posts WHERE id = ?", [$id])->fetch();
        if (empty($post)) {
            $this->back();
        }
        if ($post->selected == 1) {
            $db->update('posts', ['selected'], [0], $id);
        } else {
            $db->update('posts', ['selected'], [1], $id);
        }
        $this->back();
    }
}
