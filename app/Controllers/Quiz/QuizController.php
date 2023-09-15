<?php declare(strict_types=1);

namespace Vendon\Controllers\Quiz;

use Vendon\Core\TwigView;

class QuizController
{
    public function __construct()
    {
    }

    public function index(): TwigView
    {
        // Get quiz by id
        //get out questions of quiz model


        return new TwigView('Quiz/quiz', []);
    }
}