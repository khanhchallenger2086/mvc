<?php
class rolecontroller extends controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $model = new usermodel();
        $view = "./views/user/role.php";
        $this->render($view, ["list_user" => $model->list_user()]);
    }

    function role_level()
    {
        if (post("iduser")) {
            // xemmang(post(""));
            // exit;
            $this->role->thuhoi(post("iduser"));
            if (post("chucnang")) {
                foreach (post("chucnang") as $chucnang) {
                    $this->role->capquyen(post("iduser"), $chucnang);
                }
                chuyentrang(url("role", "index"));
            }
        }
        $model = new usermodel();
        $user = $model->get_user(get("ma"));

        if (!$user) {
            chuyentrang(url("role", "index"));
        } else {
            $view = "./views/user/role_level.php";
            $this->render($view, [
                "get_user" => $user,
                "get_dynamic" => $this->role->get_dynamic(0)
            ]);
        }
    }
}