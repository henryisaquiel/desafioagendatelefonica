<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

spl_autoload_extensions(".php");
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $classPath = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    
    if (file_exists($classPath)) {
        require_once $classPath;
    }
});