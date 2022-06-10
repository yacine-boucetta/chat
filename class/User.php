<?php require('database.php');

class User{
    public $login;
    public $password;
    public $email;



    function __construct()
    {
        $this->db=getPdo();
    }
    //---------- inserer pour inscription---------
    public function checkUser($login)
    {
        $sqlinsert = "SELECT * FROM user WHERE login =:login ";
        $signIn = $this->db->prepare($sqlinsert);
        $signIn->execute(array(
            ':login' => $login,
        ));
        $checkUser= $signIn->rowCount();
        return $checkUser;
    }
    
    public function setUser($login,$password,$email)
    {
        $sqlinsert = "INSERT INTO user (login,email,password,id_droit) VALUES(:login,:email,:password,:id_droit)";
        $signUp = $this->db->prepare($sqlinsert);
        $signUp->execute(array(
            ":login" => htmlspecialchars($login, ENT_QUOTES, "ISO-8859-1"),
            ":password" => htmlspecialchars(password_hash($password, PASSWORD_BCRYPT)),
            ":email" => htmlspecialchars($email, ENT_QUOTES, "ISO-8859-1"),
            ":id_droit" => 1
        ));
    }

    public function signUpAction($login,$password,$email){
        $message='';
        $userSignUp = new User;
        $count = $userSignUp->checkUser($login);
    
        if ($count > 0) {
            return $message = 'erreur login';
        } else {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
    
            if (!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
                $message = 'erreur password';
            } else {
                $test = $userSignUp->setUser($login, $password, $email);
                header('Location:SignIn.php');
            }
        }


    }

    //---------connexion--------------------------------

    public function userConnexion($login){
        $sqlinsert = "SELECT * FROM user WHERE login=:login ";
        $signIn = $this->db->prepare($sqlinsert);
        $signIn->execute(array(
            ':login' => $login,
        ));
        $user=$signIn->fetch();
        return ($user);
}

    public function signInAction($login,$password){
    if (isset($_POST['signIn'])) {  
        $test= new User;
        $test2=$test->checkUser($login);
        if ($test2 == 0) {
            return $message="ce login n'existe pas";
        } else {           
            $signIn=$test->userConnexion($login);
            if (password_verify(htmlspecialchars($password, ENT_QUOTES, "ISO-8859-1"),$signIn['password'])) {
                $_SESSION['user'] =$signIn; 
                header('Location:Index.php');
            }else{
            return $message='mot de passe incorrect';
            }
        }
    }
}

//------------Profil--------------------------------------------------------

public function loginUpdate($login){
    $update=$this->db->prepare("UPDATE `user` SET login=:login WHERE id= :id");
    $update->execute(array(
        ':login'=>$login,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function passwordUpdate($password){
    $update=$this->db->prepare("UPDATE `user` SET password=:password WHERE id= :id");
    $update->execute(array(
        ':password'=>$password,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function emailUpdate($email){
    $update=$this->db->prepare("UPDATE `user` SET email=:email WHERE id= :id");
    $update->execute(array(
        ':email'=>$email,
        ':id'=>$_SESSION['user']['id']
    ));}

public function userUpdate(){

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

    $b=new User;
    $b->checkUser(htmlspecialchars($_POST['login'], ENT_QUOTES, "ISO-8859-1"));
    if ($b>1) {
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
header('Location:Profil.php');


}



//---------------recuperation de donnée------------------------
public function userDisplay($id)
{
    $sqlinsert = "SELECT * FROM user WHERE id=:id";
    $display = $this->db->prepare($sqlinsert);
    $display->execute(array(
        ':id' => $id,
    ));
    $getuser= $display->fetch();
    $_SESSION['user']=$getuser;
    return $getuser;
}

}












