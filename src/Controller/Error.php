<?php

namespace CMS\Controller;

use CMS\Controller as AbstractController;

final class Error extends AbstractController {

    public function index() : void {
        http_response_code( 404 );
        echo "404- noT FOUND!";
    }

}
