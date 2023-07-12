<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface {

    public function index(){

    }

    public function RegisterUserForm() {

        return [
            "view" => VIEW_DIR."security/registerUserForm.php"
        ];

    }
}