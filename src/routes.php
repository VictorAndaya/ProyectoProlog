<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
///
/// http://localhost/apirest/public/api/v1/employee
///

// API group
$app->group('/api', function () use ($app) {
   
    $app->get('/validation','AccessLogin');
    $app->get('/setmateria','setmateria');
    $app->get('/getmaterias','getmaterias');
    $app->delete('/materiadelete','deleteMaterias');

    $app->get('/carreras','gettodaslascarreras');
    $app->get('/carrerra','getcarrera');
    $app->post('/carrera','setcarrera');
    $app->put('/carreraupdate','updatecarrera');
    $app->delete('/carreradelete','deletecarrera');

    $app->get('/getpreguntas','getpreguntas');
    $app->get('/setpreguntas','setpreguntas');
    $app->put('/updatepregunta','updatepregunta');
    $app->delete('/deletepregunta','deletepregunta');
    $app->post('/usuarios','setUsuario');

    $app->get('/getpeso','getpeso');
    $app->get('/setpeso','setpeso');
    $app->put('/updatepeso','updatepeso');
    $app->delete('/deletepeso','deletepeso');

    $app->get('/setpesomateria','setpesomateria');
    $app->get('/getpesomateria','getpesomateria');
    $app->put('/updatepesomateria','updatepesomateria');
    $app->delete('/deletepesomateria','deletepesomateria');

    $app->get('/usuario','getusuario');

    $app->get('/getCarreraMateria','getCarreraMateria');
    $app->post('/setCarreraMaterias','setCarreraMaterias');

    $app->get('/getMotor','getMotor');
    $app->get('/getTotal','getTotalCarreraMaterias');
    $app->get('/getFinal','getFinal');
    $app->get('/getDis','getDis');
});
