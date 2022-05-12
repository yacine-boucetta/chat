<?php
namespace Controller;


class Chat extends Controller
{

    protected $modelName="\models\model";
    protected $uerName="\models\user";
    
    public static function refreschChat()
    {
    }


    public static function view()
    {

        require('view/chat.php');
    }

    public function chooseChan()
    {
        $choose = $this->chat->chan();
        foreach ($choose as $value) {
            echo "<option value=" . $value['id_canal'] . ">" . $value['id_canal'] . "</option>";
        }
    }

    public function insertion($content, $id, $idCanal)
    {
        $this->chat->insertChat($content, $id, $idCanal);
    }

    public function chatInsert($idCanal)
    {
        $this->chat->chatView($idCanal);
    }

    public static function test($i)
    {
        echo (json_encode($i));
    }
}
