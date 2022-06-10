
<?php require('database.php');

class Chat
{
    function __construct()
    {
        $this->db=getPdo();
    }

    public function chatView($chat)
    {
        $sql = "SELECT content,date,user.login FROM `messages` INNER JOIN user ON messages.id_user = user.id 
        INNER JOIN cannal ON cannal.id_cannal = messages.id_canals
        WHERE cannal.id_cannal=:chat ORDER BY messages.id ASC ";

        $channel = $this->db->prepare($sql);
        $channel->execute(array(
            ":chat" => $chat,
        ));
        $channelview = $channel->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($channelview);
    }

    public function insertChat($content, $id, $idCanal)
    {
        $sql = "INSERT INTO `messages` (content,date,id_user,id_canals) Values(:content,:date,:idUser,:idCanal)  ";
        $insert = $this->db->prepare($sql);
        $insert->execute(array(
            ":content" => $content,
            ":date" => date("Y-m-d H:i:s"),
            ":idUser" => $id,
            ":idCanal" => $idCanal,
        ));
        // header('Location:Discord.php');
    }

    public function createChan($id_cannal){
        $sql = "INSERT INTO `cannal` (id_cannal) Values(:idCanal)  ";
        $insert = $this->db->prepare($sql);
        $insert->execute(array(
            ":idCanal" => $id_cannal,
        ));

    }

    public function suppChan($id_cannal){
        $sql = "delete  from `cannal` where id_cannal=:idCanal  ";
        $insert = $this->db->prepare($sql);
        $insert->execute(array(
            ":idCanal" => $id_cannal,
        ));

    }
    public function suppChan2($id_cannal){
        $sql = "delete  from `messages` where id_canals=:idCanal  ";
        $insert = $this->db->prepare($sql);
        $insert->execute(array(
            ":idCanal" => $id_cannal,
        ));

    }
    public function chan()
    {
        $sqlinsert = "SELECT * FROM `cannal` ";
        $test=$this->db->prepare($sqlinsert);
        $test->execute();
        $test3=$test->fetchAll(PDO::FETCH_ASSOC);
        foreach($test3 as $value){
            echo '<option value="' . $value['id_cannal'] . '">' . $value['id_cannal'] . '</option>';
        }
    }
}
if(isset($_GET['test'])){
    if($_GET['test']==1){
        $discordo=new chat;
 $discordo->chatView($_POST['chan']);
    }
    if($_GET['test']==2){
        $discordo=new chat;
 $discordo->chatView($_POST['chan']);
    }
    if($_GET['test']==3){
        $discordo=new chat;
 $discordo->insertChat($_POST['content'],$_POST['pseudo'],$_POST['chan']);
    }
}

