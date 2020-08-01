<?php
class systemcontroller extends controller
{
    function __construct()
    {
        parent::__construct(); // viết dư , khi kế thừa th cha thì construct của th cha cũng chạy cũng chạy trong class này
    }
    function home()
    {
        $view = "./views/system/home.php";
        $this->render($view);
    }

    function _404()
    {
        $view = "./views/system/404.php";
        $this->render($view, [], "emptylayout");
    }
}