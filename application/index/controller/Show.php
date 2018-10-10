<?php
namespace app\index\controller;

use think\Controller;

class Show extends Controller
{
    public function index()
    {
        if($this->request->isAjax())
        {
            echo 1231231;
        }
        return $this->view->fetch();
    }
    public function to_img()
    {
        if(isset($_POST['html_canvas'])){

            $html_canvas = $_POST['html_canvas'];
            $image = base64_decode(substr($html_canvas, 22));
            header('Content-Type: image/png');
            if (!is_dir(ROOT_PATH . 'public' . DS . 'uploads'.DS.date('Ymd',time()))) mkdir(ROOT_PATH . 'public' . DS . 'uploads'.DS.date('Ymd',time()));
            $filename =  ROOT_PATH . 'public' . DS . 'uploads'.DS.date('Ymd',time()).DS.time().rand(0,4).'code.png';
            $fp = fopen($filename, 'w');
            fwrite($fp, $image);
            fclose($fp);
            return DS . 'uploads'.DS.date('Ymd',time()).DS.time().rand(0,4).'code.png';
        }
    }
}