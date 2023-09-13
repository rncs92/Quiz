<?php declare(strict_types=1);

namespace Vendon\Controllers\User;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Exceptions\ValidationException;
use Vendon\Services\User\Register\RegisterPDOUserRequest;
use Vendon\Services\User\Register\RegisterPDOUserService;
use Vendon\Validation\RegistrationFormValidator;

class RegisterController
{
    private RegisterPDOUserService $userService;
    private RegistrationFormValidator $formValidator;

    public function __construct(
        RegisterPDOUserService    $userService,
        RegistrationFormValidator $formValidator
    )
    {
        $this->userService = $userService;
        $this->formValidator = $formValidator;
    }

    public function store(): Redirect
    {
        try {
            $this->formValidator->validateForm($_POST);
            $user = $this->userService->handle(
                new RegisterPDOUserRequest(
                    $_POST['name'],
                    $_POST['surname'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['confirm_password'],
                )
            );

            $userId = $user->getUser()->getUserid();

            Session::put('authid', $userId);

            return new Redirect("/index");
        } catch (ValidationException $exception) {
            return new Redirect('/');
        }
    }
}