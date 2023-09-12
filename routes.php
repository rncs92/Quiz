<?php

use Vendon\Controllers\IndexController;
use Vendon\Controllers\ResultsController;
use Vendon\Controllers\TestController;
use Vendon\Controllers\WelcomeController;

return [
    //Welcome
    ['GET', '/welcome', [WelcomeController::class, 'index']],
    //Authorization
    ['GET', '/', [IndexController::class, 'index']],
    ['POST', '/', [IndexController::class, 'store']],
    //Tests
    ['GET', '/test', [TestController::class, 'index']],
    ['POST', '/test', [TestController::class, 'storeTestAnswers']],
    //Results
    ['GET', '/results', [ResultsController::class, 'index']],
];