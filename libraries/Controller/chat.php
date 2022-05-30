<?php
namespace Libraries\Controller;



class Chat extends Controller
{
    protected $modelName=\Libraries\Model\Chat::class;

    public  function refreschChat()
    {
    }

    public  function view()
    {
        \Http::redirect("./Libraries/view/Chat");
    }

    public function insertion($content, $id, $idCanal)
    {
        $this->model->insertChat($content, $id, $idCanal);
    }

    public function chatInsert($idCanal)
    {
        $this->model->chatView($idCanal);
    }

    public function chooseChan(){
        $this->model->chan();
        return ($this->model);
    }
 
}
