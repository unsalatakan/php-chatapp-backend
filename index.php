<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

// Create app
$app = AppFactory::create();

// Connect to database
$pdo = new PDO('sqlite:database.db');

// Define routes
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write('WELCOME TO CHAT APP BACKEND');
    return $response;
});

$app->get('/users', function (Request $request, Response $response, $args) use ($pdo) {
    $stmt = $pdo->query('SELECT * FROM users');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($users));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/messages/{user_id}', function (Request $request, Response $response, $args) use ($pdo) {
    $user_id = $args['user_id'];
    $stmt = $pdo->prepare('SELECT messages.*, users.name AS sender_name FROM messages JOIN users ON messages.sender_id = users.id WHERE recipient_id = :user_id ORDER BY timestamp ASC');
    $stmt->execute(['user_id' => $user_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($messages));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->any('/{any:.*}', function (Request $request, Response $response, $args) {
    $response->getBody()->write('404 - Not found');
    return $response->withStatus(404);
});

// Run app
$app->run();