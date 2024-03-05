<?php

namespace App\Controllers;

use App\Services\Utils;
use App\Models\PostManager;
use App\Models\CommentsManager;
use App\Controllers\AbstractController;

class PostDetailController extends AbstractController
{
    public function index()
    {
        $post_id = (int)$_GET['id'];
        $title = "Post Detail";
        $manager = new PostManager();
        $post_array = $manager->getPosts($post_id);
        $post = $post_array[array_key_first($post_array)];
        $commentsManager = new CommentsManager();
        $comments = $commentsManager->getComments($post_id);
        $template = './Views/template_postdetail.phtml';
        $this->render($template, ['title' => $title, 'article' => $post, 'comments' => $comments]);
    }

    // si dans l'url il y a &action=add_comment cela effectue la fonction
    public function add_comment()
    {
        if (isset($_POST['comment']) && !empty($_POST['comment'])) {
            $post_id = (int)$_GET['id'];
            $comment = Utils::cleanInput($_POST['comment']);
            $user_id = $_SESSION['user']['id'];
            $commentsManager = new CommentsManager();
            $insertComment = $commentsManager->insert([$user_id, $post_id, $comment]);

            header('Location: ?page=postdetail&id=' . $post_id);
            exit();
        }
    }

    public function delete_comment()
    {
        if (isset($_GET['com_id'])) {
            $com_id = (int)$_GET['com_id'];
            $post_id = (int)$_GET['id'];
            $commentsManager = new CommentsManager();
            $insertComment = $commentsManager->delete(['id'=>$com_id]);

            header('Location: ?page=postdetail&id=' . $post_id);
            exit();
        }
    }
}
