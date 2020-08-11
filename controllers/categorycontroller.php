<?php
class categorycontroller extends controller
{
    public $model;
    public $table = 'category';
    function __construct()
    {
        parent::__construct(); // viết dư , khi kế thừa th cha thì construct của th cha cũng chạy cũng chạy trong class này
        $this->model = new productmodel();
    }

    function index()
    { 
        $view = "./views/product/category/category.php";
        $this->render($view, [
            "list" => $this->model->show_category()
        ]);
    }

    function category_add()
    {
        $msg = "";
        if (isset($_POST["submit"])) {
            unset($_POST["submit"]);
            if (isset($_FILES['hinh'])) {
                $path = $this->upload($_FILES['hinh'], "public/images", [".jpg", ".png", ".gif"], 2,  $msg);
                $_POST['hinh'] = $path;
                $_POST['trangthai'] = $_POST['trangthai'];
                $_POST['trangthai'] = $_POST['trangthai'];
                if ($this->check_type($_POST, $msg)) {
                    $this->model->add($this->table,$_POST);
                    chuyentrang(url('category','index'));
                } else {
                    unlink($path);
                }
            }
        }

        $view = "./views/product/form-category.php";
        $this->render($view, [
            "msg" => $msg,
            'category_parent' => $this->model->category_parent(0) 
        ]);
    }

    function category_repair()
    {
        $msg = "";
        if (isset($_POST["submit"])) {
            if (isset($_GET['ma']) && get('ma')) {
            unset($_POST["submit"]);
                if ($_FILES['hinh']['error'] == 0) {
                    unlink($this->model->get_row($this->table,get('ma'))->hinh);
                    $path = $this->upload($_FILES['hinh'], "public/images", [".jpg", ".png", ".gif"], 2,  $msg);
                    $_POST['hinh'] = $path;
                    $this->model->repair($this->table,$_POST,get('ma'));
                    chuyentrang(url('category','index'));
                } else {
                    $this->model->repair($this->table,$_POST,get('ma'));
                    chuyentrang(url('category','index'));
                }
            }
        }

        $view = "./views/product/form-category.php";
        $this->render($view, [
            "msg" => $msg,
            'list' => $this->model->get_row($this->table,get('ma')),
            'category_parent' => $this->model->category_parent(0) 
        ]);
    }

    function category_remove()
    {
        if (isset($_GET["ma"]) && get("ma")) {
            $this->model->remove($this->table,get("ma"));
        }
    }
    
    function category_show() {
        if (isset($_GET['ma']) && get('ma')) {
            $this->model->show($this->table,get("ma"));
        } 
    }

    function category_hidden() {
        if (isset($_GET['ma']) && get('ma')) {
            $this->model->hidden($this->table,get("ma"));
        } 
    }
}