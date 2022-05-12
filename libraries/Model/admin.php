<?php

namespace Model;

class Admin extends Model
{

    public $login;
    public $password;
    public $firstname;
    public $lastname;
    public $email;

    function __construct()
    {
        $this->login;
        $this->password ;
        $this->firstname ;
        $this->lastname ;
        $this->email ;
    }



//-----------------------------------kick ban user ----------------------------------------------------

public function userDelete($id){
    $delete=$this->db->prepare("DELETE FROM user WHERE id=:id");
    $delete->execute(array(
        ':id' => $id
    ));
}
//--------------------------------------Select user----------------------------------------------------
public function getUser(){
    $getUser = $this->db->prepare("SELECT * FROM user");
    $getUser->execute();
    $result = $getUser->fetchAll();
    //var_dump($result);
    return $result;
}

//--------------------------------------update droits user ----------------------------------------------------
public function updateRight($idDroit,$id){
    $updateUser = $this->db->prepare("UPDATE `user` SET `id_droits`=:id_droits WHERE id=:id");
    $updateUser->execute(array(
        ':id_droits' => $idDroit,
        ':id' => $id
    ));

}

}