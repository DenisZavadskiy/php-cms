<?php
class LoginController
{
    public static function login() {
        if($_POST["login"] == 'admin' && $_POST["password"] == 'password') {
            $_SESSION["IS_ADMIN"] = true;
            header("Location: .");
        }
        else header("Location: ?act=login");
    }

    public static function logout() {
        unset($_SESSION["IS_ADMIN"]);
        header("Location: .");
    }
}