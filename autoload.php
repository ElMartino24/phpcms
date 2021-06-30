<?php

namespace CMS;

/**
 * Autoload callback function (Nach PSR-4 (Composer))
 * @param   string  $class
 * @return  void
 */
function autoload( string $class ) : void {
    /** @var string $replace_namespace */
    $replace_namespace = str_replace( __NAMESPACE__ . '\\', CMS_APPLICATION_DIR . DIRECTORY_SEPARATOR, $class );
    /** @var string $create_dir_path */
    $create_dir_path = str_replace( '\\', DIRECTORY_SEPARATOR, $replace_namespace ); 
    /** @var string $file_to_load */
    $file_to_load = "{$create_dir_path}.php";

    if ( file_exists( $file_to_load ) ) {
        require_once $file_to_load;
    }
}

// Autoloader callback registrieren
spl_autoload_register( __NAMESPACE__ . '\\autoload' );
