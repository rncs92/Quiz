<?php declare(strict_types=1);

namespace Vendon\Controllers\Index;

use Vendon\Core\Session;
use Vendon\Core\TwigView;

class IndexController
{
    public function index(): TwigView
    {
        if (!Session::get('user')) {
            return new TwigView('User/login', []);
        }
        return new TwigView('index', []);
    }
}