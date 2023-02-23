<?php

use Core\App;
use Core\Database;

App::bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database']);
});
