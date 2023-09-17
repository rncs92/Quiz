<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\Session;
use Vendon\Core\TwigView;

class ResultsController
{

    public function __construct(

    )
    {
    }

    public function index(): TwigView
    {
        $user = Session::get('user');
        $userName = substr($user->getName(), 0, -1);
        return new TwigView('Quiz/results', [
            'user' => $userName
        ]);
    }
}