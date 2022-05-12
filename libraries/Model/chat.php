<?php
namespace Model;

class Chat extends Model
{

    function __construct()
    {
    }

    public static function refreschChat()
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
        $sqlinsert = "SELECT * FROM canal ";
        $chan = $this->db->prepare($sqlinsert);
        $chan->execute();
        $chanselect = $chan->fetchAll();
        return $chanselect;
    }
}