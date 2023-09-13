<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\Session;
use Vendon\Core\TwigView;

class IndexController
{
    public function __construct(

    )
    {

    }

    public function index(): TwigView
    {
        Session::unflash('user_id');
        Session::unflash('test');

        return new TwigView('index', []);
    }
}