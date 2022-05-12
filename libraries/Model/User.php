<?php

namespace Model;

class User extends Model
{

    public $login;
    public $password;
    public $email;

    protected $modelName=\model\User::class;
    //---------- inserer pour inscription---------
    public function checkUser($login)
    {
        $sqlinsert = "SELECT * FROM user WHERE login=:login ";
        $signIn = $this->pdo->prepare($sqlinsert);
        $signIn->execute(array(
            ':login' => $login,
        ));
        $checkUser= $signIn->rowCount();
        return $checkUser;
    }
    
    public function setUser($login,$password,$email)
    {
        $sqlinsert = "INSERT INTO user (login,email,password,id_droit) VALUES(:login,:email,:password,:id_droit)";
        $signUp = $this->pdo->prepare($sqlinsert);
        $signUp->execute(array(
            ":login" => $login,
            ":password" => $password,
            ":email" => $email,
            ":id_droit" => 1
        ));
    }


    //---------connexion--------------------------------

    public function userConnexion($login){
        $sqlinsert = "SELECT * FROM user WHERE login=:login ";
        $signIn = $this->pdo->prepare($sqlinsert);
        $signIn->execute(array(
            ':login' => $login,
        ));
        $user=$signIn->fetch();
        return ($user);
}


//------------Profil--------------------------------------------------------

public function loginUpdate($login){
    $update=$this->pdo->prepare("UPDATE `user` SET login=:login WHERE id= :id");
    $update->execute(array(
        ':login'=>$login,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function passwordUpdate($password){
    $update=$this->pdo->prepare("UPDATE `user` SET password=:password WHERE id= :id");
    $update->execute(array(
        ':password'=>$password,
        ':id'=>$_SESSION['user']['id']
    ));
}

public function emailUpdate($email){
    $update=$this->pdo->prepare("UPDATE `user` SET email=:email WHERE id= :id");
    $update->execute(array(
        ':email'=>$email,
        ':id'=>$_SESSION['user']['id']
    ));
}


//---------------recuperation de donnée------------------------
public function userDisplay($id)
{
    $sqlinsert = "SELECT * FROM user WHERE id=:id";
    $display = $this->pdo->prepare($sqlinsert);
    $display->execute(array(
        ':id' => $id,
    ));
    $getuser= $display->fetch();
    $_SESSION['user']=$getuser;
    return $getuser;
}


}