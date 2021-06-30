<?php

namespace CMS\Controller;

use CMS\Controller as AbstractController;

final class About extends AbstractController {
    
    public function index() : void {
        $this->View->data = [
            'title' => 'About page'
        ];

        $this->View->get_header_template();
        $this->View->get_template_part( 'index' );
        $this->View->get_footer_template();
    }

    public function you() : void {
        echo "ABOUT YOU!";
    }

    public function someone( string $param = 'S' ) : void {
        echo "ABOUT {$param}!";
    }
    
}