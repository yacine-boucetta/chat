<?php
namespace controller;



class Profil extends controller
{
    protected $modelName="\models\model";
    protected $uerName="\models\user";


    public static function  view()
    {
        require("view/profil.php");
    }

    public static function stackUpdapte()
    {
        $message=[];
        if (isset($_POST['valider'])) {
            Profil::checkEmpty();
            Profil::updateLogin();
            Profil::updateEmail();
            Profil::updatePassword();
            $display = new \models\User();
            $display->userDisplay($_SESSION['user']['id']);    
            }  

            if(!empty($message)){
            foreach($message as $value){
                echo $value;
                // var_dump($value);
        }
        }
    }

    public static function checkEmpty()
    {
        if (empty($_POST['login'])) {
            $_POST['login'] = $_SESSION['user']['login'];
        }
        if (empty($_POST['password'])) {
            $_POST['password'] = $_SESSION['user']['password'];
        }
        if (empty($_POST['password2'])) {
            $_POST['password2'] = '';
        }
        if (empty($_POST['email'])) {
            $_POST['email'] = $_SESSION['user']['email'];
        }

    }

    public static function updateLogin()
    {
        $check = new \models\Model();
        $checkLogin = $check->checkUser(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));
        if ($checkLogin > 0) {
            return ;
        } 
        else {
            $updateUser = new \models\user();
            $updateUser->loginUpdate(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));
        }
    }

    public static function updatePassword()
    {
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        $password2 = htmlspecialchars($_POST['password2'], ENT_QUOTES, "ISO-8859-1");
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

            if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
            return;
        }
            if (strlen($_POST['password']) >= 6) {
                if ($password == $password2) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $updatepassword = new \models\User();
                    $updatepassword->passwordUpdate($password);
                }
            }
    }
    public static function updateEmail()
    {
        $update = new \models\User();
        $update->emailUpdate(htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1"));
    }



}