<?php

namespace App\Helper;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Log {
    
    public function getLogger($logName = 'logger',$filename = 'app')
    {
        // Create the logger
        $logger = new Logger($logName);
        // Now add some handlers
        $logger->pushHandler(new StreamHandler(__DIR__.'/logs/'.$filename.'.log', Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());
        
        return $logger;
    }
}
