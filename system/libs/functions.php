<?php
session_start();

function thongbao($txt)
{
    return $thongbao =  '<div class="alert alert-danger">' . $txt . '</div>';
}

function islogin()
{
    if (isset($_SESSION['login']) && $_SESSION['login']) {
        return true;
    }
    return false;
}

function xemmang($array)
{
    echo '<pre>', print_r($array), '</pre>';
}

function chuyentrang($url)
{
    return header("location:" . $url);
}

function url($controller = "system", $action = "home", $extra = [])
{
    $str = "";
    if (isset($extra)) {
        foreach ($extra as $key => $value) {
            $str .= "&" . $key . "=" . $value . "&";
        }
        $str = rtrim($str, "&");
    }
    return "index.php?controller=" . $controller . "&action=" . $action . $str;
}

function post($name)
{
    if ($name == "") {  // ko viết điều kiện này sẽ bị báo lỗi
        return $_POST;
    } else {
        if (isset($_POST[$name]) && $_POST[$name]) {
            return is_string($_POST[$name]) ? trim($_POST[$name]) : $_POST[$name];
        }
    }
}

function get($name)
{
    if ($name == '') {  // ko viết điều kiện này sẽ bị báo lỗi
        return $_GET;
    } else {
        if (isset($_GET[$name]) && $_GET[$name]) {
            return is_string($_GET[$name]) ? trim($_GET[$name]) : $_GET[$name];
        }
    }
}