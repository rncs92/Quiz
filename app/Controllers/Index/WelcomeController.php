<?php declare(strict_types=1);

namespace Vendon\Controllers\Index;

use Vendon\Core\Session;
use Vendon\Core\TwigView;

class WelcomeController
{
    public function index(): TwigView
    {
        if (Session::get('user')) {
            return new TwigView('/index', []);
        }
        return new TwigView('welcome', []);
    }
}