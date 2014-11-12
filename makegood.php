<?php

exec('/home/rik/bin/phantomjs --webdriver=4444  > /dev/null 2>&1 &');

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';