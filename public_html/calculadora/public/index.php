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


include 'funciones/calculadora.php';
include 'funciones/distancia.php';
include 'funciones/16091103_pentagono.php';
include 'funciones/16091065_area.php';
include 'funciones/16091246_Trapecio.php';
include 'funciones/16091221_pitagoras.php';
include 'funciones/16091216_Binomio.php';
include 'funciones/16091299_PuntoMedio.php';
include 'funciones/16091072conversor.php';
include 'funciones/16091204_radio.php';
include 'funciones/16091178_gravedad.php';
include 'funciones/16091165_promedio.php';
include 'funciones/16091105_areatrapecio.php';
include 'funciones/16091130_cuadrado.php';
include 'funciones/16091227_fuerza.php';
include 'funciones/16091196_mruv.php';
include 'funciones/15091080_velocidad.php';
include 'funciones/17090324_triangulo.php';

include 'funciones/16091198_suma.php';
include 'funciones/alumnos.php';
include 'funciones/17091072_CRUD.php';
include 'funciones/17091100_areatriangulo.php';
$app->run();

