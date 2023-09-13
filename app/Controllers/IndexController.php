<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Exceptions\ValidationException;
use Vendon\Services\User\Authorization\AuthorizePDOUserRequest;
use Vendon\Services\User\Authorization\AuthorizePDOUserService;
use Vendon\Validation\IndexValidator;

class IndexController
{
    private AuthorizePDOUserService $authorizePDOUserService;
    private IndexValidator $validator;

    public function __construct(
        AuthorizePDOUserService $authorizePDOUserService,
        IndexValidator          $validator
    )
    {
        $this->authorizePDOUserService = $authorizePDOUserService;
        $this->validator = $validator;
    }

    public function index(): TwigView
    {
        Session::unflash('user_id');
        Session::unflash('test');

        return new TwigView('index', []);
    }

    public function store(): Redirect
    {
        try {
            $this->validator->validateIndex($_POST);
            $this->authorizePDOUserService->handle(
                new AuthorizePDOUserRequest(
                    $_POST['username'],
                    $_POST['test'],
                )
            );

            Session::put('test', $_POST['test']);

            return new Redirect("test");
        } catch (ValidationException $exception) {
            return new Redirect('/index');
        }
    }
}