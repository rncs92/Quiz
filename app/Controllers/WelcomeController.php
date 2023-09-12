<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\Session;
use Vendon\Core\TwigView;

class WelcomeController
{
    public function index(): TwigView
    {
        return new TwigView('welcome', []);
    }
}