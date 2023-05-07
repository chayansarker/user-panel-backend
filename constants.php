<?php

define('BASE_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/');

define('SUB_DIR', '/user-panel-backend');

define('BASE_URL', "http://" . $_SERVER['HTTP_HOST'] . SUB_DIR);