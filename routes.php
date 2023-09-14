<?php

use Vendon\Controllers\Index\IndexController;
use Vendon\Controllers\Index\WelcomeController;
use Vendon\Controllers\Quiz\CreateController;
use Vendon\Controllers\Quiz\ResultsController;
use Vendon\Controllers\Quiz\TestController;
use Vendon\Controllers\User\LoginController;
use Vendon\Controllers\User\RegisterController;

return [
    //Welcome
    ['GET', '/', [WelcomeController::class, 'index']],
    //Index
    ['GET', '/index', [IndexController::class, 'index']],
    //Register
    ['POST', '/', [RegisterController::class, 'store']],
    //Login/Logout
    ['GET', '/login', [LoginController::class, 'index']],
    ['POST', '/login', [LoginController::class, 'login']],
    ['POST', '/logout', [LoginController::class, 'logout']],
    //Question
    ['GET', '/test', [TestController::class, 'index']],
    //Create test
    ['GET', '/create', [CreateController::class, 'index']],
    ['POST', '/create', [CreateController::class, 'store']],
    //Complete test
    ['POST', '/test', [TestController::class, 'storeTestAnswers']],
    //Results
    ['GET', '/results', [ResultsController::class, 'index']],
];