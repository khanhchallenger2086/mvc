<?php
class usercontroller extends controller
{
    function login()
    {
        $thongbao = "";
        if (post('user') && post('pass')) {
            $obj = new usermodel();
            $user = $obj->login_get_row(post('user'), post('pass'));

            if ($user) {
                if ($user->trangthai == 1) {
                    chuyentrang(url());
                    $_SESSION["login"] = true;
                    $_SESSION["avt"] = $user->hinh;
                    $_SESSION["ten"] = $user->ten;
                    $_SESSION['ma'] = $user->ma;
                } else {
                    $thongbao = thongbao("Tài khoản bạn bị khóa");
                }
            } else {
                $thongbao = thongbao("Bạn nhập sai tài khoản");
            }
        }

        $view = "./views/user/login.php";
        $this->render($view, ["class" => "login", "thongbao" => $thongbao], "emptylayout");
    }

    function logout()
    {
        session_destroy();
        chuyentrang(url("user", "login"));
    }

    // function check_login()
    // {
    //     $user = NULL;
    //     if (isset($_POST['user'], $_POST['pass'])) {
    //         $obj = new usermodel();
    //         $user = $obj->login_get_row($_POST['user'], $_POST['pass']);
    //         if ($user) {
    //             $view = "./views/system/home.php";
    //             $this->render($view, [], "layout");
    //             $_SESSION['login'] = true;
    //             $_SESSION['name'] = $user->ten;
    //             $_SESSION['image'] = $user->hinh;
    //         } else {
    //             header("location:index.php?controller=user&action=login&thongbao=");
    //             $view = "./views/user/login.php";
    //             $this->render($view, ["thongbao" => thongbao("Bạn nhập sai thông tin!!")], "layout_login");
    //         }
    //     }
    // }

}

// header thì ko có thong báo 
// còn render thì nó vẫn giữ action = check_login 