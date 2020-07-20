<?php

session_start();
$_SERVER['DOCUMENT_ROOT'] = 'C:\Xqesc\OpenServer\domains\logistikCRM';
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('CONTROLLER_PATH', ROOT. '/controllers/');
define('MODEL_PATH', ROOT. '/models/');
define('VIEW_PATH', ROOT. '/views/');
define('UPLOADAVATAR_DIR', ROOT. '/image/avatar/');
define('UPLOADDREAM_DIR', ROOT. '/image/dreamimage/');
define("UPLOAD_FOLDER", ROOT. "/docs/");

require_once('db.php');
require_once('route.php');
require_once MODEL_PATH. 'Model.php';
require_once VIEW_PATH. 'View.php';
require_once CONTROLLER_PATH. 'Controller.php';

Routing::buildRoute();