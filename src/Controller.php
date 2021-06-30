<?php

namespace CMS;

//Load the model and the view
abstract class Controller {

    protected ?Model $Model = NULL;

    protected ?View $View = NULL;

    public function __construct( ?string $modelClass = NULL ) {
        $this->View = new View();

        if ( $modelClass !== NULL ) {
            $this->initModel( $modelClass );
        }
    }

    public function initModel( string $modelClass ) {
        if ( $this->Model instanceof $modelClass === FALSE ) {
            $this->Model = new $modelClass();
        }

        return $this->Model;
    }

}