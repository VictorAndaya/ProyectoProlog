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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ .'/../vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ .'/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ .'/../vendor/phpmailer/phpmailer/src/SMTP.php';

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

/////////////////////////////////////////////////////////////
//-----------Security--------------------------
////////////////////////////////////////////////
//------Conexión con la base de datos----------
require_once __DIR__ . '/../includes/DbConnect.php';
////////////////////////////////////////////////

include 'Controller/validation.php';
include 'Controller/materias.php';
include 'Controller/carreras.php';
include 'Controller/preguntas.php';
include 'Controller/usuarios.php';
include 'Controller/pesoCarrera.php';
include 'Controller/pesoMateria.php';
include 'Controller/CarreraMaterias.php';
$app->run();

