<?php
ob_start();
include "./system/config/config.php";
include "./system/libs/functions.php";

spl_autoload_register(function ($classname) {
    $pathmodel = "./models/" . $classname . ".php"; // tên file phải cùng tên class , lấy tên class bỏ vô đây kiểm tra có đường dẫn thì include vào
    $pathcontroller = "./controllers/" . $classname . ".php";  // new class controller , lấy tên bỏ vô đây kiểm tra xem có không rùi include
    $pathsystemdb = "./system/database/" . $classname . ".php"; // này hỏi lại ông thấy , ko có new sao bít mà include
    if (file_exists($pathmodel)) { // cũng có thể models kế thừa nó (database,general) và nó phải new mới chạy dc 
        include $pathmodel;
    }

    if (file_exists($pathcontroller)) {
        include $pathcontroller;
    }

    if (file_exists($pathsystemdb)) {
        include $pathsystemdb;
    }
});