<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/vendor/autoload.php';
foreach (glob("/email/_lib/*.php") as $filename)
 {
 	include $filename;
 }


session_start();

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';
// Register middleware
require __DIR__ . '/src/middleware.php';
// database settings
require __DIR__ . '/conf/dbSettings.php';
require __DIR__ . '/email/_lib/PHPMailerAutoload.php';
require __DIR__ . '/email/mealler.php';
require __DIR__ . '/email/sender.php';
// controlles
require __DIR__ . '/controllers/controllers.php';
require __DIR__ . '/controllers/userController.php';
require __DIR__ . '/controllers/rentalController.php';
require __DIR__ . '/controllers/quoteController.php';
// Register routes
require __DIR__ . '/src/routes.php';


// Run app
$app->run();
