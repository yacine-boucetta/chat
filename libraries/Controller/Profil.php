<?php
namespace Libraries\Controller;

use Libraries\Model\User;
class Profil extends Controller
{
    protected $modelName= \Libraries\Model\User::class;

    public function  view()
    {
        \Http::redirect("./libraries/view/".$_GET['url']);
    }

    public  function checkEmpty()
    {
        if(isset($_POST['valider'])){
            
        session_start();
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

        $b=$this->model->checkUser(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));
        if ( $b>1) {
            return ;
        } 

            $test3=new User;
            $test3->loginUpdate(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));        
            $_SESSION['user']['login']=$_POST['login'];


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
                    $updatepassword = new User();
                    $updatepassword->passwordUpdate($password);
                }
            }

            $update = new User();
            $update->emailUpdate(htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1"));
            $_SESSION['user']['email']=$_POST['email'];
            
            \Http::redirect("./libraries/view/profil");
    }
}



}