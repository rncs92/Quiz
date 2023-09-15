<?php

use Vendon\Controllers\Index\IndexController;
use Vendon\Controllers\Index\WelcomeController;
use Vendon\Controllers\Quiz\CreateController;
use Vendon\Controllers\Quiz\QuizController;
use Vendon\Controllers\Quiz\ResultsController;
use Vendon\Controllers\User\LoginController;
use Vendon\Controllers\User\RegisterController;

return [
    //Welcome
    ['GET', '/', [WelcomeController::class, 'index']],
    //Register
    ['POST', '/', [RegisterController::class, 'store']],
    //Index
    ['GET', '/index', [IndexController::class, 'index']],
    ['POST', '/index', [IndexController::class, 'chooseQuiz']],
    //Login/Logout
    ['GET', '/login', [LoginController::class, 'index']],
    ['POST', '/login', [LoginController::class, 'login']],
    ['POST', '/logout', [LoginController::class, 'logout']],
    //Create test
    ['GET', '/create', [CreateController::class, 'index']],
    ['POST', '/create', [CreateController::class, 'store']],
    //Quiz
    ['GET', '/quiz', [QuizController::class, 'index']],
    //Results
    ['GET', '/results', [ResultsController::class, 'index']],
];