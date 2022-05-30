<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <header style="width:100%;">

    <nav>
 <?php 
      if(!isset($_SESSION['user'])){
        echo"<a href=../?url=Home&task=view>Home</a>&nbsp";
      echo "<a href=../../?url=SignUp&task=view>inscription</a>&nbsp";
      echo"<a href =../../?url=SignIn&task=view> connexion </a>";
      }
     else{
      echo"<a href=../../?url=Home&task=view>Home</a>&nbsp";
        echo "<a href=../../?url=Profil&task=view>Profil</a>&nbsp" ;
        echo "<a href=../../?url=chat&task=view>Chat</a>&nbsp" ;
        echo "<a href='disconnect'>deconnexion</a>";
        if( $_SESSION['user']['id_droit']==2){
          echo "<a href='Admin'>Admin</a>" ;
          }
      }?>
      
    </nav>
    </header>
