<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface {

    public function index(){

    }

    public function ConnectUserForm() {
        // Par défaut on présente la page de connection, mais on peut être redirigé vers la page de création d'utilisateur et vice versa.
        return [
            "view" => VIEW_DIR."security/connectUserForm.php"
        ];
    }

    public function RegisterUserForm() {

        return [
            "view" => VIEW_DIR."security/registerUserForm.php"
        ];

    }
}