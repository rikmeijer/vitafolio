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
        
        return function(array $services) use ($prefix, $base_dir) {
            $factoryClassname = $prefix . NAMESPACE_SEPARATOR . 'Factory';
            return new $factoryClassname($services);
        };
    });
    
    require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    
    return $services = array(
        'library' => array_map(function($libraryFactory) use (&$services) {
            return function() use ($libraryFactory, &$services) {
                return $libraryFactory($services);
            };
        }, $libraryFactories)
    );
};