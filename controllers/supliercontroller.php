<?php
class supliercontroller extends controller
{
    public $model;
    public $table = 'suplier';
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
                $this->model->add($this->table,$_POST);
                chuyentrang(url('suplier','index'));
            }
        }

        $view = "./views/product/form-suplier.php";
        $this->render($view, [
            "msg" => $msg
        ]);
    }

    function suplier_repair()
    {
        $msg = "";
        if (isset($_POST["submit"])) {
            unset($_POST["submit"]);
            if (isset($_GET['ma']) && get('ma')) {
            $this->model->repair($this->table,$_POST,get('ma'));
            chuyentrang(url('suplier','index'));
            }
        }

        $view = "./views/product/form-suplier.php";
        $this->render($view, [
            "msg" => $msg,
            'list' => $this->model->get_row($this->table,get('ma'))
        ]);
    }

    function suplier_remove()
    {
        if (isset($_GET["ma"]) && get("ma")) {
            $this->model->remove($this->table,get("ma"));
        }
    }
    
    function suplier_show() {
        if (isset($_GET['ma']) && get('ma')) {
            $this->model->show($this->table,get("ma"));
        } 
    }

    function suplier_hidden() {
        if (isset($_GET['ma']) && get('ma')) {
            $this->model->hidden($this->table,get("ma"));
        } 
    }
}