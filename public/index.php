<?php

namespace CMS;

// Require configuration file
require_once '../config.php';

// Require autoload file
require_once '../autoload.php';

// Require session file
require_once '../session.php';

//Instantiate core class
( new Core() )->run();
