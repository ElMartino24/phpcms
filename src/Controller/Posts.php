<?php

namespace CMS\Controller;

use CMS\Controller as AbstractController;
use CMS\Model\Post as PostModel;

final class Posts extends AbstractController {

    protected ?PostModel $Model = NULL;

    public function __construct() {    
        parent::__construct( PostModel::class );
    }

    public function index() : void {
        $posts = $this->Model->findAllPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function create() : void  {
        if(!isLoggedIn()) {
            header("Location: " . "/posts");
        }

        $data = [
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'titleError' => '',
                'bodyError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->Model->addPost($data)) {
                    header("Location: " . "/posts");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('posts/create', $data);
            }
        }

        $this->view('posts/create', $data);
    }

    public function update($id) {

        $post = $this->Model->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: "  . "/posts");
        } elseif($post->user_id != $_SESSION['user_id']){
            header("Location: " . "/posts");
        }

        $data = [
            'post' => $post,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'post' => $post,
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'titleError' => '',
                'bodyError' => ''
            ];

            if(empty($data['title'])) {
                $data['titleError'] = 'The title of a post cannot be empty';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if($data['title'] == $this->Model->findPostById($id)->title) {
                $data['titleError'] == 'At least change the title!';
            }

            if($data['body'] == $this->Model->findPostById($id)->body) {
                $data['bodyError'] == 'At least change the body!';
            }

            if (empty($data['titleError']) && empty($data['bodyError'])) {
                if ($this->Model->updatePost($data)) {
                    header("Location: "  . "/posts");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('posts/update', $data);
            }
        }

        $this->view('posts/update', $data);
    }

    public function delete($id) {

        $post = $this->Model->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . "/posts");
        } elseif($post->user_id != $_SESSION['user_id']){
            header("Location: "  . "/posts");
        }

        $data = [
            'post' => $post,
            'title' => '',
            'body' => '',
            'titleError' => '',
            'bodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->Model->deletePost($id)) {
                    header("Location: "  . "/posts");
            } else {
               die('Something went wrong!');
            }
        }
    }
}