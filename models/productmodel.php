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

    function category_parent($macha) {
        return $this->setquery('select * FROM `category` where macha=?')->loadrows([$macha]);
    }

    function show_trademark()
    {
        return $this->setquery('select * FROM `trademark`')->loadrows();
    }

    function show_suplier()
    {
        return $this->setquery('select * FROM `suplier`')->loadrows();
    }
}