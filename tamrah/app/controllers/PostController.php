<?php
require_once "app/core/Controller.php";
require_once "app/models/Post.php";

class PostController extends Controller {
    public function index() {
        $post = new Post();
        $data = $post->getAllPosts();
        echo json_encode($data);
    }

    public function create() {
        $data = json_decode(file_get_contents("php://input"), true);
        $post = new Post();
        $result = $post->createPost($data);
        echo json_encode($result);
    }
}
?>
