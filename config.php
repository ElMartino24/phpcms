<?php

namespace CMS;

// Error Reporting & Debuging
// Ausschalten bei Livegang
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Directory Paths
define( 'CMS_ROOT_DIR',         __DIR__ );
define( 'CMS_SOURCE_DIR',       __DIR__ . DIRECTORY_SEPARATOR . 'src' ); 
define( 'CMS_PUBLIC_DIR',       __DIR__ . DIRECTORY_SEPARATOR . 'public' );
define( 'CMS_TEMPALTE_DIR',     __DIR__ . DIRECTORY_SEPARATOR . 'templates' );

define( 'CMS_ROOT_URL',         $_SERVER[ 'HTTP_HOST' ] );

// Database Configuration
define( 'DB_HOST', 'localhost' );   //Add your db host
define( 'DB_USER', 'root' );        //Add your DB root
define( 'DB_PASS', 'root' );        //Add your DB pass
define( 'DB_NAME', 'mvchau' );      //Add your DB Name
