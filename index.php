<?php
include "./system/autoload.php"; // tắt cái này sẽ báo ra không tìm thấy class vì ko có include vào sao có class
$controllerName = ($_GET["controller"] ?? "system") . "controller";
$action = $_GET["action"] ?? "home";

$path = "./controllers/" . $controllerName . ".php";

if (file_exists($path)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        if (islogin()) {
            if ($action != "login") {
                // $controller->$action();
                if ($controller->role->isrole($_SESSION['ma'], $_GET["controller"], $action)) {
                    $controller->$action();
                } else {
                    $controller = new systemcontroller();
                    $controller->_404();
                }
            } else {
                chuyentrang(url());
            }
        } else {
            // chuyentrang(url("user", "login"));  tại sao lại là new controller mà ko phải là chuyen trang
            $controller = new usercontroller();
            $controller->login(); // new ra 1 hàm login để đăng nhập 
            // chuyentrang(url("user", "login")); // chưa có đăng nhập thì lùi về 
        }
    } else {
        $controller = new systemcontroller();
        $controller->_404();
    }
} else {
    $controller = new systemcontroller();
    $controller->_404();
}
ob_end_flush();