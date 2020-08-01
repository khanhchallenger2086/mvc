<?php
include 'libs/functions.php';
include 'core/core-database.php';
include 'core/core-user.php';

$user = NULL;
if (islogin()) {
    header('location:index.php');
}

if (isset($_POST['user'], $_POST['pass'])) {
    $obj = new user();
    $user = $obj->login_get_row($_POST['user'], $_POST['pass']);
}

if ($user) {
    header('location:index.php');
    $_SESSION['login'] = true;
    $_SESSION['name'] = $user->ten;
    $_SESSION['image'] = $user->hinh;
} else {
    $thongbao = thongbao('Bạn nhập  sai thông tin rùi!!');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng nhập</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">

</body>

</html>