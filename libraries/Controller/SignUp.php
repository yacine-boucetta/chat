<?php
namespace Libraries\Controller;


class SignUp extends Controller
{
    protected $modelName= \Libraries\Model\User::class;

    public function view()
    {
        \Http::redirect("./Libraries/view/".$_GET['url']);
    }

    public function signUpAction()
    {$message='';
    
        if (isset($_POST['sign_up'])) { 

            $b =  $this->model->checkUser($_POST['login']);
            var_dump($b);
            if ($b > 1) {
                return $message;
            }  
            if(empty($_POST['password'])||empty($_POST['login'])||empty($_POST['email'])){
                $message='veuillez remplir tout les champs';
            return $message;
        }
    
           
            $password=$_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
                return $message;
        }else {
                $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT));
                $newLogin = htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1");
                $newEmail = htmlspecialchars($_POST['email'], ENT_QUOTES, "ISO-8859-1");
                $this->model->setUser($newLogin, $password, $newEmail);
            }
            
             \Http::redirect("./Libraries/view/signIn");
        }
    }
}
