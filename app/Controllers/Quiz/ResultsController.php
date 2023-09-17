<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\TwigView;


class ResultsController
{
    public function __construct(

    )
    {
    }

    public function index(): TwigView
    {
        var_dump($_POST);die;
        return new TwigView('Quiz/results', []);
    }
}