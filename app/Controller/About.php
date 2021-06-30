<?php

namespace CMS\Controller;

use CMS\Controller as AbstractController;

final class About extends AbstractController {
    
    public function index() : void {
        echo "ABOUT!";
    }

    public function you() : void {
        echo "ABOUT YOU!";
    }

    public function someone( string $param = 'S' ) : void {
        echo "ABOUT {$param}!";
    }
    
}