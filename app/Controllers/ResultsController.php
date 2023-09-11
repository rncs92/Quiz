<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\TwigView;
use Vendon\Services\User\Show\ShowPDOUserService;

class ResultsController
{

    private ShowPDOUserService $userService;

    public function __construct(ShowPDOUserService $userService)
    {

        $this->userService = $userService;
    }

    public function index(): TwigView
    {
        $user = $this->userService->handle();
        $userName = substr($user->getUsername(), 0, -1);

        return new TwigView('results', [
            'user' => $user,
            'userName' => $userName
        ]);
    }
}