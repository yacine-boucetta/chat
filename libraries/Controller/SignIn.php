<?php
namespace Libraries\Controller;


class SignIn extends Controller
{
    protected $modelName= \Libraries\Model\User::class;

    public function view()
    {
        \Http::redirect("./libraries/view/".$_GET['url']);
    }

    public function signInAction()
    {
        $message = '';
        if (isset($_POST['signIn'])) {  
            if ($this->model->checkUser($_POST['login']) < 1) {
                return $message;
            } else {           
                $a=$this->model->userConnexion($_POST['login']);
                if (password_verify(htmlspecialchars($_POST['password'], ENT_QUOTES, "ISO-8859-1"),$a['password'])) {
                    session_start();
                    $_SESSION['user'] =$a; 
                    \Http::redirect("./Libraries/view/Home");
                }else{
                    return $message;
                }
            }
        }
    }
}
