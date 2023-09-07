<?php

use Vendon\Controllers\IndexController;

return [
    //Index
    ['GET', '/', [IndexController::class, 'index']],

];