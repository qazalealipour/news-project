<?php

namespace App;

use database\Database;

class Home 
{
    public function index()
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting")->fetch();
        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL;")->fetchAll();

        $topSelectedPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.selected = 1 AND posts.status = 'enable' ORDER BY created_at DESC LIMIT 0,3")->fetchAll();

        $breakingnews = $db->select("SELECT * FROM posts WHERE breaking_news = 1 ORDER BY id DESC LIMIT 0,1;")->fetch();

        $lastPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.status = 'enable' ORDER BY created_at DESC LIMIT 0,6")->fetchAll();
        $banners = $db->select("SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,2;")->fetchAll();

        $popularPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.status = 'enable' ORDER BY view DESC LIMIT 0,3")->fetchAll();

        $mostCommentPosts = $db->select("SELECT posts.*, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.status = 'enable' ORDER BY commentCount DESC LIMIT 0,4")->fetchAll();
        require_once BASE_PATH . '/template/app/index.php';
    }

    public function showCategory($id)
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting")->fetch();
        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL;")->fetchAll();

        $topSelectedPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.selected = 1 AND posts.status = 'enable' ORDER BY created_at DESC LIMIT 0,3")->fetchAll();
        $banners = $db->select("SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,2;")->fetchAll();

        $popularPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.status = 'enable' ORDER BY view DESC LIMIT 0,3")->fetchAll();

        $mostCommentPosts = $db->select("SELECT posts.*, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.status = 'enable' ORDER BY commentCount DESC LIMIT 0,4")->fetchAll();

        $category = $db->select("SELECT * FROM categories WHERE id = ?", [$id])->fetch();

        $categoryPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id AND comments.status = 'approved') AS commentCount FROM posts WHERE posts.cat_id = ? ORDER BY published_at DESC;", [$id])->fetchAll();
        require_once BASE_PATH . '/template/app/category.php';
    }

    public function showPost($id)
    {
        $db = new Database();
        $setting = $db->select("SELECT * FROM setting")->fetch();
        $menus = $db->select("SELECT * FROM menus WHERE parent_id IS NULL;")->fetchAll();

        $topSelectedPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.selected = 1 AND posts.status = 'enable' ORDER BY created_at DESC LIMIT 0,3")->fetchAll();
        $banners = $db->select("SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,2;")->fetchAll();

        $popularPosts = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.status = 'enable' ORDER BY view DESC LIMIT 0,3")->fetchAll();

        $mostCommentPosts = $db->select("SELECT posts.*, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE posts.status = 'enable' ORDER BY commentCount DESC LIMIT 0,4")->fetchAll();

        $post = $db->select("SELECT posts.*, (SELECT categories.name FROM categories WHERE posts.cat_id = categories.id) AS categoryName, (SELECT users.username FROM users WHERE posts.user_id = users.id) AS userName, (SELECT COUNT(comments.id) FROM comments where posts.id = comments.post_id) AS commentCount FROM posts WHERE id = ?", [$id])->fetch();

        $comments = $db->select("SELECT *, (SELECT users.username FROM users WHERE comments.user_id = users.id) AS userName FROM comments WHERE status = 'approved' AND post_id = ?", [$id])->fetchAll();
        $db->update('posts', ['view'], [$post->view + 1], $id);
        require_once BASE_PATH . '/template/app/post.php';
    }

    public function commentStore($request, $id)
    {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $db = new Database();
            $request['user_id'] = $_SESSION['user'];
            $request['post_id'] = $id;
            $db->insert('comments', array_keys($request), $request);
            $this->back();
        } else {
            $this->back();
        }

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
}