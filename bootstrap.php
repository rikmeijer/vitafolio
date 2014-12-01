<?php
return function ()
{
    define('NAMESPACE_SEPARATOR', '\\');
    
    $libraryAutoload = require __DIR__ . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'autoload.php';
    $libraryFactories = $libraryAutoload(function ($prefix, $base_dir)
    {
        spl_autoload_register(function ($class) use($prefix, $base_dir)
        {
            // does the class use the namespace prefix?
            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                // no, move to the next registered autoloader
                return;
            }
            
            // get the relative class name
            $relative_class = substr($class, $len);
            
            // replace the namespace prefix with the base directory, replace namespace
            // separators with directory separators in the relative class name, append
            // with .php
            $file = $base_dir . str_replace(NAMESPACE_SEPARATOR, DIRECTORY_SEPARATOR, $relative_class) . '.php';
            
            // if the file exists, require it
            if (file_exists($file)) {
                require_once $file;
            }
        });
    });
    
    require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    
    return array(
        'root-path' => __DIR__,
        'library' => $libraryFactories
    );
};