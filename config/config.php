<?php

/**
 * The constant definitions to hold the configuration of application.
 *
 * @author Yipeng Huang <huang.ypeng@gmail.com>
 */

// Database configurations
define('DB_DIR',      dirname(__DIR__) . '/database/');
define('DB_FILENAME', 'dev.sqlite');

// Application runtime configurations
define('STORAGE_DIR',            dirname(__DIR__) . '/storage/');
define('CREATION_TYPE_MODEL',    'model');
define('CREATION_TYPE_INSTANCE', 'instance');
define('CREATION_TYPE_SOLUTION', 'solution');

// Dev configurations
define('DEBUG', false);

// END /config/config.php
