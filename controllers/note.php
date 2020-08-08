<?php 
    //repair product

    // if (isset($_POST["submit"])) {
        //     unset($_POST["submit"]);
        //     if ($_FILES["hinh"]["error"] == 0 && $_FILES["hinhchitiet"]["error"] == 0) {
        //         $this->model->product_remove_img(get("ma"));
        //         $path = $this->upload($_FILES["hinh"], "./public/images", [".jpg", ".png", ".gif"], 2, $msg);
        //         $pathdetail = $this->upload($_FILES["hinhchitiet"], "./public/images", [".jpg", ".png", ".gif"], 2, $msg);
        //         $_POST["hinh"] = $path;
        //         $_POST["hinhchitiet"] = $pathdetail;
        //         $this->model->repair(post(""), get("ma"));
        //         chuyentrang(url("product", "index"));
        //     } else {
        //         $product = $this->model->get_row($this->table,get("ma")); 
        //         $_POST["hinh"] = $product->hinh;
        //         $_POST["hinhchitiet"] = $product->hinhchitiet;
        //         $this->model->repair(post(""), get("ma"));
        //         chuyentrang(url("products", "index")); // header về đâu
        //         // $this->index(); -> chỉ là load cái view ra thui vẫn giữ cái mã ở trên thanh url 
        //     }
        // }

    //add product

     // if (isset($_POST["submit"])) {
        //     unset($_POST["submit"]);
        //     if (isset($_FILES['hinh'], $_FILES['hinhchitiet'])) {

        //         $path = $this->upload($_FILES['hinh'], "public/images", [".jpg", ".png", ".gif"], 2,  $msg);
        //         $pathdetail = $this->upload($_FILES['hinhchitiet'], "public/images", [".jpg", ".png", ".gif"], 2, $msg);
        //         if ($path && $pathdetail) { // path khác rỗng khác null khác false tức là phải có $path
        //             $_POST['hinh'] = $path;
        //             $_POST['hinhchitiet'] = $pathdetail;
        //             $_POST['trangthai'] = $_POST['trangthai'];
        //             if ($this->check_type($_POST, $msg)) {
        //                 $this->model->add($_POST);
        //                 chuyentrang(url($this->table, "index"));
        //             }
        //         }
        //     }
        // }

?>