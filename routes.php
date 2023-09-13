<?php

use Vendon\Controllers\Index\IndexController;
use Vendon\Controllers\Index\WelcomeController;
use Vendon\Controllers\ResultsController;
use Vendon\Controllers\TestController;
use Vendon\Controllers\User\LoginController;
use Vendon\Controllers\User\RegisterController;

return [
    //Welcome
    ['GET', '/', [WelcomeController::class, 'index']],
    ['POST', '/', [RegisterController::class, 'store']],
    //Authorization
    ['GET', '/login', [LoginController::class, 'index']],
    ['POST', '/login', [LoginController::class, 'login']],
    ['POST', '/logout', [LoginController::class, 'logout']],

    ['GET', '/index', [IndexController::class, 'index']],
    //Tests
    ['GET', '/test', [TestController::class, 'index']],
    ['POST', '/test', [TestController::class, 'storeTestAnswers']],
    //Results
    ['GET', '/results', [ResultsController::class, 'index']],
];