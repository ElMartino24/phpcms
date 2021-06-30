<?php

namespace CMS;

// Require configuration file
require_once '../config.php';

// Require autoload file
require_once '../autoload.php';

//Instantiate core class
( new Core() )->run();
