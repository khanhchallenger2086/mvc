<?php
    class productsMiddleware extends controller {
        function middleware_add($post,&$msg,$hinh = "" ,$hinhchitiet = "") {
            if (isset($post["submit"])) {
                unset($post["submit"]);
                if (isset($hinh,$hinhchitiet)) {
                    $path = $this->upload($hinh, "public/images", [".jpg", ".png", ".gif"], 2,  $msg);
                    $pathdetail = $this->upload($hinhchitiet, "public/images", [".jpg", ".png", ".gif"], 2, $msg);
                    if ($path && $pathdetail) { // path khác rỗng khác null khác false tức là phải có $path
                        $post['hinh'] = $path;
                        $post['hinhchitiet'] = $pathdetail;
                        if ($this->check_type($post, $msg)) { 
                            return $post;
                        } else {
                            unlink($path);
                            unlink($pathdetail);
                        }
                    }
                } else {
                    if ($this->check_type($post, $msg)) { 
                        return $post;
                    } 
                }
            }
        }

        function middleware_repair($post,&$msg,$ma,$hinh = null ,$hinhchitiet = null) {
            if (isset($post["submit"])) {
                unset($post["submit"]);
                    if ($hinh['error']  == 0 && $hinhchitiet['error'] == 0) {
                        $this->model->product_remove_img($ma);
                        $path = $this->upload($hinh, "./public/images", [".jpg", ".png", ".gif"], 2, $msg);
                        $pathdetail = $this->upload($hinhchitiet, "./public/images", [".jpg", ".png", ".gif"], 2, $msg);
                        $post["hinh"] = $path;
                        $post["hinhchitiet"] = $pathdetail;
                        return $post;
                        } else {
                        $product = $this->model->get_row($this->table,$ma); 
                        $post["hinh"] = $product->hinh;
                        $post["hinhchitiet"] = $product->hinhchitiet;
                        return $post;
                    }
                } 
        }
}