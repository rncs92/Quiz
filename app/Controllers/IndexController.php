<?php declare(strict_types=1);

namespace Vendon\Controllers;

use Vendon\Core\Redirect;
use Vendon\Core\Session;
use Vendon\Core\TwigView;
use Vendon\Exceptions\ValidationException;
use Vendon\Services\Authorization\AuthorizePDOUserRequest;
use Vendon\Services\Authorization\AuthorizePDOUserService;
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
            return new Redirect('/');
        }
    }
}