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

    // function suplier_remove()
    // {
    //     if (isset($_GET["ma"]) && get("ma")) {
    //         $this->model->remove(get("ma"));
    //         chuyentrang(url("product", "index"));
    //     }
    // }
    
    // function suplier_show() {
    //     if (isset($_GET['ma']) && get('ma')) {
    //         $product = $this->model->product_get_row(get('ma'));
    //         $this->model->show($product,get('ma'));
    //         chuyentrang(url('product','index'));
    //     } 
    // }

    // function suplier_hidden() {
    //     if (isset($_GET['ma']) && get('ma')) {
    //         $product = $this->model->product_get_row(get('ma'));
    //         $this->model->hidden($product,get('ma'));
    //         chuyentrang(url('product','index'));
    //     } 
    // }
}