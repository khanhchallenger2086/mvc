<?php
class controller
{
    public $role;
    public $menus;

    function __construct()
    {
        $this->role = new rolemodel();
        if (isset($_SESSION['ma'])) {
            $this->menus = $this->role->danhsachchucnangtheouser($_SESSION["ma"], 0);
        }
    }

    function render($view, $data = [], $layout = "layout")
    {
        if (isset($data)) {
            extract($data);
        }
        include "./views/" . $layout . ".php";
    }

    function upload($file, $folder, $types = ['.jpg', '.png', '.gif'], $size = 2, &$msg = '')
    {
        if (isset($file['error']) && $file['error'] == 0) {
            $ext = substr($file['name'], strrpos($file['name'], '.'));
            if (in_array($ext, $types)) {
                $maxsize = $size * 1024 * 1024; //byte
                if ($file['size'] > 0 && $file['size'] < $maxsize) {
                    $path = $folder . '/file_' . rand(0, 999) . '_' . rand(0, 99999) . '_' . time() . $ext;
                    move_uploaded_file($file['tmp_name'], $path);
                    return $path;
                } else {
                    $msg = 'Chỉ cho phép kích cỡ ' . $size . 'mb';
                    return false;
                }
            } else {
                $msg = 'Chỉ cho phép ' . implode(',', $types);
                return false;
            }
        } else {
            $msg = 'Bạn chưa up hình và không được bỏ trống';
            return false;
        }
    }

    function check_type($array, &$msg)
    {   
        $result = true;
        foreach ($array as $key => $value) {
            if ($value == "") {
                $msg = "Bạn nhập thiếu thông tin";
                $result = false;
            }
        }
        return $result;
    }
}

// tạo hàm check image và hàm add post còn thiêu vào $_POST và  action truyền vào mảng chuyển tên class 
// tên class cần new trong hàm add vì mỗi cái mỗi new à 
// rùi truyền thêm cả controller và action
/// truyền 3 cái controller đi về 
// và action đi về đâu 
// và tên class của cái hàm cần thêm 

// xong add rùi giờ check lỗi

// hàm add này phải tách ra để dùng chung cho user
// 42 43 44 45 46 truyền qua bằng action hết rùi làm 