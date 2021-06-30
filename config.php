<?php

namespace CMS;

// Error Reporting & Debuging
// Ausschalten bei Livegang
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Directory Paths
define( 'CMS_ROOT_DIR',         __DIR__ );
define( 'CMS_APPLICATION_DIR',  __DIR__ . DIRECTORY_SEPARATOR . 'app' ); 
define( 'CMS_PUBLIC_DIR',       __DIR__ . DIRECTORY_SEPARATOR .'public' );

// Database Configuration
define( 'DB_HOST', 'localhost' );   //Add your db host
define( 'DB_USER', 'root' );        //Add your DB root
define( 'DB_PASS', 'root' );        //Add your DB pass
define( 'DB_NAME', 'mvchau' );      //Add your DB Name
