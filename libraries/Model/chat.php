<?php
namespace Libraries\Model;


class Chat extends Model
{
    protected $modelName=Libraries\Model\Chat::class;

    function __construct()
    {
    }

    public  function refreschChat()
    {
    }


    public function chatView($chat)
    {
        $sql = "SELECT content,date,user.login FROM `messages` INNER JOIN user ON messages.id_user = user.id 
        INNER JOIN canal ON canal.id_canal = messages.id_canals
        WHERE canal.id_canal=:chat ";

        $channel = $this->db->prepare($sql);
        $channel->execute(array(
            ":chat" => $chat,
        ));
        $channelview = $channel->fetchAll();
        echo json_encode($channelview);
    }

    public function insertChat($content, $id, $idCanal)
    {
        $sql = "INSERT INTO messages (content,id_user,date,id_canals) Values(:content,:idUser,:date,:idCanal)";

        $insert = $this->db->prepare($sql);
        $insert->execute(array(
            ":content" => $content,
            ":idUser" => $id,
            ":date" => date("Y-m-d H:i:s"),
            ":idCanal" => $idCanal,
        ));
    }

    public function chan()
    {
        $sqlinsert = "SELECT * FROM `cannal` ";
        $test3=$this->pdo->prepare($sqlinsert);
        $test3=$this->pdo->execute();
        $test3=$this->pdo->fetchall(\PDO::FETCH_ASSOC);
        return($test3);
        var_dump($test3);
    }
}

