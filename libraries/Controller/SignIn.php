<?php
namespace controller;


class SignIn extends controller
{
    protected $modelName="\models\model";
    protected $uerName="\models\user";

    public function view()
    {
        require_once('view/signIn.php');
    }

    public function signInAction()
    {
        $message = '';
        if (isset($_POST['signIn'])) {
            if ($this->user->checkUser($_POST['login']) < 1) {
                return $message;
            } else {           
                $this->user->userConnexion($_POST['login']);
                if (password_verify(htmlspecialchars($_POST['password'], ENT_QUOTES, "ISO-8859-1"),$this->user['password'])) {
                    $_SESSION['user'] =$this->user; 
                    header('Location:./');
                }else{
                    return $message;
                }
            }
        }
    }
}
