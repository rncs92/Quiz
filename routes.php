<?php

use Vendon\Controllers\IndexController;
use Vendon\Controllers\ResultsController;
use Vendon\Controllers\TestController;

return [
    //Authorization
    ['GET', '/', [IndexController::class, 'index']],
    ['POST', '/', [IndexController::class, 'store']],
    //Tests
    ['GET', '/test', [TestController::class, 'index']],
    ['POST', '/test', [TestController::class, 'storeTestAnswers']],
    //Results
    ['GET', '/results', [ResultsController::class, 'index']],
];