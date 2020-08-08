<?php
class productmodel extends general
{
    var $table = 'products';

    /* Hàm xóa ảnh của sản phẩm */
    function product_remove_img($ma)
    {
        unlink($this->get_row($this->table,$ma)->hinh);
        unlink($this->get_row($this->table,$ma)->hinhchitiet);
    }

    function show_category()
    {
        return $this->setquery('select * FROM `category`')->loadrows();
    }

    function show_trademark()
    {
        return $this->setquery('select * FROM `trademark`')->loadrows();
    }

    function show_suplier()
    {
        return $this->setquery('select * FROM `suplier`')->loadrows();
    }

    // /* Hàm thêm của sản phẩm */
    // function product_add() {
    //     $array = $this->array;
    //     $this->setquery("INSERT INTO `products` (`mahienthi`, `madanhmuc`, `manhacungcap`, `mathuonghieu`,`soluong`, `dongia`,`ten`, `hinh`, `mota`, `chitiet`, `hinhchitiet`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    //     $this->save($array); // xử lý param bằng mảng và gửi kết quả ; // lưu kết quả vào cở sở dữ liệu nên được gọi hàm save , không cần trả về cũng được 
    //     $this->disconnect();
    //     header('location:index.php?click=products');
    // }

    // //* Hàm xóa của sản phẩm */
    // function product_remove($ma) {
    //     $this->setquery("delete from `products` WHERE `products`.`ma` = ?")->save([$ma]);
    //     $this->disconnect();
    //     header('location:index.php?click=products');
    // }

    /* Hàm sửa của sản phẩm */
    // function product_repair($ma) {
    //     $array = $this->array;
    //     $this->setquery("UPDATE `products` SET `mahienthi` = ?,`madanhmuc` = ?,`manhacungcap` = ?,`mathuonghieu` = ?,`soluong` = ?,`dongia` = ?,`ten` = ?,`hinh` = ?,`mota` = ?,`chitiet` = ?,`hinhchitiet` = ? WHERE `products`.`ma` = ?");
    //     $this->save($array); // xử lý param bằng mảng và gửi kết quả ; // lưu kết quả vào cở sở dữ liệu nên được gọi hàm save , không cần trả về cũng được 
    //     $this->disconnect();
    //     header('location:index.php?click=products');
    // }
}