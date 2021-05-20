<?php
function autoloader($className){

    if (file_exists($className.'.php') && is_readable($className.'.php')){
        require_once $className.'.php';
    }
}
spl_autoload_register("autoloader");