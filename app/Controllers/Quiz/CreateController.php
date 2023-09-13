<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Session;
use Vendon\Core\TwigView;

class CreateController
{
    public function index(): TwigView
    {
        if (!Session::get('user')) {
            return new TwigView('User/login', []);
        }
        return new TwigView('Quiz/create', []);
    }
}