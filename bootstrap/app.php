<?php
ob_start();

require_once "vendor/autoload.php";

require_once "bootstrap/constants.php";

require_once "helper/helpers.php";

require_once "bootstrap/database.php";

\App\Providers\AppServiceProvider::register();

\App\Providers\ViewServiceProvider::register();

\App\Vendor\Router\RouterInitialize::verifyRoute();
?>

