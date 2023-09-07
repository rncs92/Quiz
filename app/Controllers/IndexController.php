<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\TwigView;

class IndexController
{
    public function index(): TwigView
    {
        return new TwigView('index', []);
    }
}