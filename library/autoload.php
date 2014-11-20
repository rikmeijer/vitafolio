<?php
return function ($autoloader)
{
    $factories = array();
    $dirhandle = opendir(__DIR__);
    while ($directory = readdir($dirhandle)) {
        if (is_dir(__DIR__ . DIRECTORY_SEPARATOR . $directory)) {
            $autoloader($directory, __DIR__ . DIRECTORY_SEPARATOR . $directory);
            $factories[$directory] = function() use (&$factories, $directory) {
                $factoryClassname = $directory . NAMESPACE_SEPARATOR . 'Factory';
                return new $factoryClassname($factories);
            };
        }
    }
    closedir($dirhandle);
    return $factories;
};