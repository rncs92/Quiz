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
        return new TwigView('Quiz/quiz', []);
    }

    public function chooseQuiz(): TwigView
    {
        return new TwigView('Quiz/quiz', []);
    }
}