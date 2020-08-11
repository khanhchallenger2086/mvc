<?php
class general extends database
{
    function add($table,$post)
    {
        $colum = $ask = '';
        $value = [];

        foreach ($post as $k => $v) {
            $colum .= '`' . $k . '`,'; // key,key
            $ask .= '?,';
            $value[] = trim($v); // value không cần mà vì là thêm
        }
      
        $colum = rtrim($colum, ',');
        $ask = rtrim($ask, ',');
       
        return $this->setquery('insert into `' . $table . '` (' . $colum . ') VALUES (' . $ask . ')')->save($value);
    }

    function repair($table,$post, $ma)
    {
        $change = '';
        $value = [];

        foreach ($post as $k => $v) {
            $change .= '`' . $k . '`=?,'; // key =?,key =?
            $value[] = trim($v); // value cộng mã vì là sửa
        }
        $change = rtrim($change, ',');
        $value[] = $ma;
        // return $this->setquery('update `' . $this->table . '` SET ' . $change . 'WHERE `' . $this->table . '`.`ma` =?')->save($value); // trên ko dc
        return $this->setquery('update `' . $table . '` SET ' . $change . ' WHERE `' . $table . '`.`ma` =?')->save($value);  // dưới dc
    }

    /* Hàm lấy ra sản phẩm nhiều dòng */
    function get_rows($table)
    {
        return $this->setquery('select * FROM `' . $table . '`')->loadrows();
    }

    /* Hàm lấy ra sản phẩm 1 dòng */
    function get_row($table,$ma)
    {   
        return $this->setquery('select * FROM `' . $table . '` WHERE ma = ?')->loadrow([$ma]);
    }

    function show($table,$ma) {
        $list = $this->get_row($table,$ma);
        $list->trangthai = 1;
        $this->repair($table,$list,$ma);
        chuyentrang(url($table,'index'));
    }

    function hidden($table,$ma) {
        $list = $this->get_row($table,$ma);
        $list->trangthai = 0;
        $this->repair($table,$list,$ma);
        chuyentrang(url($table,'index'));
    }

    function remove($table,$ma) 
    {      
        $this->setquery('delete FROM `' . $table. '` WHERE `'.$table.'`.`ma` = ?')->save([$ma]);
        chuyentrang(url($table,'index'));
    }
}