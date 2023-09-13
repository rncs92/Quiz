<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Exceptions\ValidationException;
use Vendon\Services\User\Authorization\AuthorizePDOUserRequest;
use Vendon\Services\User\Authorization\AuthorizePDOUserService;
use Vendon\Validation\RegistrationFormValidator;

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