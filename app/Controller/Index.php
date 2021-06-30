<?php

namespace CMS\Controller;

use CMS\Controller as AbstractController;

final class Index extends AbstractController {


    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

}