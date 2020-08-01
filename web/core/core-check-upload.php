<?php
    // function check_type($post,&$thongbaoloi) {
    //     xemmang($post);exit;
    //     foreach ($post as $k => $v) {
    //         if (!empty($v)) {
    //             if (is_numeric($post['soluong']) && is_numeric($post['dongia']) && is_numeric($post['mahienthi'])) {
    //                 return true;
    //                 break;
    //             } else {
    //                 $thongbaoloi = '<div class="alert alert-danger">Dữ liệu bạn nhập chưa đúng</div>';
    //                 return false;
    //                 break;
    //             }
    //         } else {
    //             $thongbaoloi = '<div class="alert alert-danger">Bạn không được bỏ trống</div>';
    //             return false;
    //             break; // ko chayj xem lai
    //         }
    //     }
    // }    
    
    function upload($file,$folder,$types = ['.jpg','.png','.gif'],$size = 2,&$msg = '') {
        if (isset($file['error']) && $file['error'] == 0) {
            $ext = substr($file['name'],strrpos($file['name'],'.'));
            if (in_array($ext,$types)) {
                $maxsize = $size * 1024 * 1024; //byte
                if ($file['size'] > 0 && $file['size'] < $maxsize) {
                    $path = $folder . '/file_' .rand(0,999).'_'.rand(0,99999).'_'.time() . $ext;
                    move_uploaded_file($file['tmp_name'],$path);
                    return $path;
                } else {
                    $msg = 'Chỉ cho phép kích cỡ ' . $size . 'mb';
                    return false;
                }
            } else {
                $msg = 'Chỉ cho phép ' . implode(',',$types);
                return false;
            }
        } else {
            $msg = 'Hình ảnh của bạn chưa được upload '; 
            return false;
        }
    }

      function check_type($post,&$thongbaoloi) {
          xemmang($post);
        foreach ($post as $k => $v) {
            echo $v; exit;
            if ($v == '') {
                $thongbaoloi = '<div class="alert alert-danger">Bạn không được bỏ trống</div>';
                return false;
            } else {
                if (is_numeric($post['soluong']) && is_numeric($post['dongia']) && is_numeric($post['mahienthi'])) {
                        return true;
                    } else {
                        $thongbaoloi = '<div class="alert alert-danger">Dữ liệu bạn nhập chưa đúng</div>';
                        return false;
                        break;
                }
            }
        }
    } 
?>