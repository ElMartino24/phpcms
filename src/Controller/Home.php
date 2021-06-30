<?php

namespace CMS\Controller;

use CMS\Controller as AbstractController;

final class Home extends AbstractController {

    public function index() : void {
        $this->View->data = [
            'title' => 'Home page'
        ];

        $this->View->get_header_template();
        $this->View->get_template_part( 'index' );
        $this->View->get_footer_template();
    }

}