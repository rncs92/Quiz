<?php

use Vendon\Controllers\IndexController;
use Vendon\Controllers\TestController;

return [
    //Authorization
    ['GET', '/', [IndexController::class, 'index']],
    ['POST', '/', [IndexController::class, 'store']],
    //Tests
    ['GET', '/test', [TestController::class, 'indexTest3']],
    ['GET', '/test2', [TestController::class, 'index2']],

    ['GET', '/test3', [TestController::class, 'indexTest3']],
    ['POST', '/test3', [TestController::class, 'storeAnswersTest3']],

];