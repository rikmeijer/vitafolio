<?php
return function ($autoloader)
{
     $dirhandle = opendir(__DIR__);
     while ($directory = readdir($dirhandle)) {
         if (is_dir(__DIR__ . DIRECTORY_SEPARATOR . $directory)) {
             $autoloader($directory, __DIR__ . DIRECTORY_SEPARATOR . $directory);
         }
     }
     closedir($dirhandle);
};