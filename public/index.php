<?php declare(strict_types=1);

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Vendon\Core\Redirect;
use Vendon\Core\Renderer;
use Vendon\Core\Router;
use Vendon\Core\Session;
use Vendon\Core\TwigView;

require_once '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$loader = new FilesystemLoader('../app/Views');
$twig = new Environment($loader);

$routes = require_once '../routes.php';
$response = Router::route($routes);

if($response instanceof TwigView) {
    $renderer = new Renderer();

    echo $renderer->render($response);
    Session::unsetErrors();
}

if($response instanceof Redirect) {
    header('Location: '.$response->getPath());
}