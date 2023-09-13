<?php declare(strict_types=1);

namespace Vendon\Controllers\User;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Exceptions\LoginException;
use Vendon\Services\User\Login\LoginPDOUserService;
use Vendon\Validation\LoginValidator;

class LoginController
{
    private LoginPDOUserService $loginService;
    private LoginValidator $loginValidator;

    public function __construct(
        LoginPDOUserService $loginService,
        LoginValidator $loginValidator
    )
    {
        $this->loginService = $loginService;
        $this->loginValidator = $loginValidator;
    }

    public function index(): TwigView
    {
        if(Session::get('user')){
            return new TwigView('welcome', []);
        }
        return new TwigView('User/login', []);
    }

    public function login(): Redirect
    {
        try {
            $this->loginValidator->validateLogin($_POST);
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->loginService->handle($email, $password);

            Session::put('user', $user);

            return new Redirect('/index');
        } catch (LoginException $exception) {
            return new Redirect('/login');
        }
    }

    public function logout(): Redirect
    {
        Session::destroy();

        return new Redirect('/login');
    }
}