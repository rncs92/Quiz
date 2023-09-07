<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\TwigView;

class TestController
{
    public function index()
    {
        return new TwigView('Tests/test1', []);
    }
}