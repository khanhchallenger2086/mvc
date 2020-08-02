<?php
class supliercontroller extends controller
{
    public $model;
    function __construct()
    {
        parent::__construct(); // viết dư , khi kế thừa th cha thì construct của th cha cũng chạy cũng chạy trong class này
        $this->model = new productmodel();
    }

    function index()
    {
        $view = "./views/product/suplier/suplier.php";
        $this->render($view, [
            "list" => $this->model->show_suplier()
        ]);
    }

    function suplier_add()
    {
        $msg = "";
        if (isset($_POST["submit"])) {
            unset($_POST["submit"]);
            if ($this->check_type($_POST, $msg)) {
                echo "Thành công";
            }
        }

        $view = "./views/product/form-suplier.php";
        $this->render($view, [
            "msg" => $msg
        ]);
    }
}