<?php
class productcontroller extends controller
{
    public $model;

    function __construct()
    {
        parent::__construct(); // chạy hàm danh sách chức năng theo cha để widget có menus load ra
        $this->model = new productmodel();
    }

    function index()
    {
        $view = "./views/product/product.php";
        $this->render($view, [
            "list" => $this->model->product_get_rows()
        ]);
    }

    function product_add()
    {
        $msg = "";
        if (post("")) {
            if (isset($_FILES['hinh'], $_FILES['hinhchitiet'])) {
                $path = $this->upload($_FILES['hinh'], "./public/image", [".jpg", ".png", ".gif"], 2,  $msg);
                $pathdetail = $this->upload($_FILES['hinhchitiet'], "./public/image", [".jpg", ".png", ".gif"], 2, $msg);
                if ($path && $pathdetail) { // path khác rỗng khác null khác false tức là phải có $path
                    $_POST['hinh'] = $path;
                    $_POST['hinhchitiet'] = $pathdetail;
                    $_POST['trangthai'] = $_POST['trangthai'];
                    if ($this->check_type($_POST, $msg)) {
                        $this->model->add($_POST);
                        $this->index();
                    }
                }
            }
        }
        $view = "./views/product/product-add.php";
        $this->render($view, [
            "trademarks" => $this->model->show_trademark(),
            "categorys" => $this->model->show_category(),
            "supliers" => $this->model->show_suplier(),
            "msg" => $msg
        ]);
    }

    function product_remove()
    {
        if (isset($_GET["ma"]) && get("ma")) {
            $product = $this->model->product_get_row(get("ma"));
            $product->trangthai = 0;
            $this->model->repair($product, get("ma"));
            $this->index();
        }
    }

    function product_repair()
    {
        // if (post("")) {
        //     if
        // }
        $msg = "";

        $view = "./views/product/product-add.php";
        $this->render($view, [
            "trademarks" => $this->model->show_trademark(),
            "categorys" => $this->model->show_category(),
            "supliers" => $this->model->show_suplier(),
            "list" => $this->model->product_get_row(get("ma")),
            "msg" => $msg
        ]);
    }
}