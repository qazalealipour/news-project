<?php

namespace Admin;

use database\Database;

class Comment extends Admin
{
    public function index()
    {
        $db = new Database();
        $unseenComments = $db->select("SELECT * FROM comments WHERE status = ?", ['unseen']);
        $comments = $db->select("SELECT comments.*, users.username AS userName, posts.title AS title FROM comments LEFT JOIN users ON comments.user_id = users.id LEFT JOIN posts ON comments.post_id = posts.id ORDER BY id DESC;")->fetchAll();
        foreach ($unseenComments as $comment) {
            $db->update('comments', ['status'], ['seen'], $comment->id);
        }
        require_once BASE_PATH . '/template/admin/comment/index.php';
    }

    public function changeStatus($id)
    {
        $db = new Database();
        $user = $db->select("SELECT * FROM comments WHERE id = ?", [$id])->fetch();
        if ($user->status == 'approved') {
            $db->update('comments', ['status'], ['seen'], $id);
        } else {
            $db->update('comments', ['status'], ['approved'], $id);
        }
        $this->back();
    }
}