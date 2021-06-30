<?php

namespace CMS;

use CMS\Controller;

// Wir wollen keine Erben von Core haben, deshalb als Final deklariert
final class Core {
 
    const DEFAULT_CONTROLLER = 'Index';
    const DEFAULT_METHOD     = 'index';

    const ERROR_CONTROLLER    = 'Error';
    const ERROR_METHOD        = 'index';

    private ?Controller $Controller = NULL;

    public function run() : void {
      /** @var array $url */
      $url = $this->getUrl();
      /** @var string $controller */
      $controller = 'CMS\\Controller\\' . $url[ 'controller' ];
      /** @var string $method */
      $method = $url[ 'method' ];
      /** @var string $argument */
      $argument = $url[ 'argument' ];

      // Überprüfen ob ein Controller und die angefragte Methode existiert
      if ( $this->controllerExists( $controller ) && $this->controllerMethodExists( $controller, $method ) ) {
          $this->Controller = new $controller();

          if ( empty( $argument ) ) {
            $this->Controller->{$method}();
          }
          else{
            $this->Controller->{$method}( $argument );
          }
      }
      // Error Controller laden
      else {
          $errorController = 'CMS\\Controller\\' . self::ERROR_CONTROLLER;
          $errorMethod = self::ERROR_METHOD;

          $this->Controller = new $errorController();
          $this->Controller->{$errorMethod}();
      }

    }

    private function controllerExists( string $controller ) : bool {

      return class_exists( $controller );
    }

    private function controllerMethodExists( string $controller, string $method ) : bool {

      return method_exists( $controller, $method );
    }
 
    // private, weil die Methode nur innerhalb der Klasse Core aufgerufen wird
    private function getUrl() : array {
      /** @var string $url */
      $url = $_GET[ '_url' ] ?? '';
      /** @var string $rtrim */
      $rtrim = rtrim( $url, '/' );
      /** @var string $filter */
      $filter = filter_var( $rtrim, FILTER_SANITIZE_URL );
      /** @var string $explode */
      $explode = explode( '/', $url );

      return [
        'controller'  =>  $explode[ 0 ] ?? self::DEFAULT_CONTROLLER,
        'method'      =>  $explode[ 1 ] ?? self::DEFAULT_METHOD,
        'argument'    =>  $explode[ 2 ] ?? ''
      ];
    }

}
