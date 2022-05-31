
<?php require('./');

class Chat
{
    function __construct()
    {
        $this->db=getPdo();
    }

    public  function refreschChat()
    {
    }


    public function chatView($chat)
    {
        $sql = "SELECT content,date,user.login FROM `messages` INNER JOIN user ON messages.id_user = user.id 
        INNER JOIN cannal ON cannal.id_cannal = messages.id_canals
        WHERE cannal.id_cannal=:chat ";

        $channel = $this->db->prepare($sql);
        $channel->execute(array(
            ":chat" => $chat,
        ));
        $channelview = $channel->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($channelview);
    }

    public function insertChat($content, $id, $idCanal)
    {
        $sql = "INSERT INTO `messages` (content,date,id_user,id_canals) Values(:content,:date,:idUser,:idCanal)";
        $insert = $this->db->prepare($sql);
        $insert->execute(array(
            ":content" => $content,
            ":date" => date("Y-m-d H:i:s"),
            ":idUser" => $id,
            ":idCanal" => $idCanal,
        ));
    }

    public function chan()
    {
        $sqlinsert = "SELECT * FROM `cannal` ";
        $test=$this->db->prepare($sqlinsert);
        $test->execute();
        $test3=$test->fetchAll(PDO::FETCH_ASSOC);
        foreach($test3 as $value){
            echo '<option value="' . $value['id'] . '">' . $value['id_cannal'] . '</option>';

        }
    }
}
if(isset($_GET['test'])){
$discordo=new chat;
@ $discordo->chatView($_POST['chan']);
}