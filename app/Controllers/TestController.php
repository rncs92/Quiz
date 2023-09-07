<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\TwigView;

class TestController
{
    public function index():TwigView
    {
        return new TwigView('Tests/test1', []);
    }

    public function index2():TwigView
    {
        return new TwigView('Tests/test2', []);
    }

    public function index3():TwigView
    {
        return new TwigView('Tests/test3', []);
    }
}