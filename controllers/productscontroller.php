<?php
class productscontroller extends productsMiddleware
{
    public $model;
    public $table = 'products';

    function __construct()
    {
        parent::__construct(); // chạy hàm danh sách chức năng theo cha để widget có menus load ra
        $this->model = new productmodel();
    }

    function index()
    {
        $view = "./views/product/product.php";
        $this->render($view, [
            "list" => $this->model->get_rows($this->table)
        ]);
    }

    function product_add()
    {   
        $msg = "";
        $post = $this->middleware_add($_POST,$msg,$_FILES['hinh'], $_FILES['hinhchitiet']);
        if ($post) {
            $this->model->add($post);
            chuyentrang(url($this->table, "index"));
        } 
        
        $view = "./views/product/form-product.php";
        $this->render($view, [
            "trademarks" => $this->model->show_trademark(),
            "categorys" => $this->model->show_category(),
            "supliers" => $this->model->show_suplier(),
            "msg" => $msg
        ]);
    }

    function product_repair()
    {    
        $msg = "";
        $post = $this->middleware_repair($_POST,$msg,get('ma'),$_FILES['hinh'], $_FILES['hinhchitiet']);
        if ($post) {
            $this->model->repair($post, get("ma"));
            chuyentrang(url($this->table, "index"));
        }

        $view = "./views/product/form-product.php";
        $this->render($view, [
            "trademarks" => $this->model->show_trademark(),
            "categorys" => $this->model->show_category(),
            "supliers" => $this->model->show_suplier(),
            "list" => $this->model->get_row($this->table,get("ma")),
            "msg" => $msg
        ]);
    }

    function product_remove()
    {
        if (isset($_GET["ma"]) && get("ma")) {
            $this->model->remove($this->table,get("ma"));
        }
    }
    
    function product_show() {
        if (isset($_GET['ma']) && get('ma') ) {
            $this->model->show($this->table,get('ma'));
        }
    }

    function product_hidden() {
        if (isset($_GET['ma']) && get('ma') ) {
            $this->model->hidden($this->table,get('ma'));
        }
    }

}