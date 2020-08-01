<?php
class rolemodel extends general
{
    public $table = "dynamic";
    function get_dynamic($macha)
    {
        return $this->setquery("select * FROM `" . $this->table . "` WHERE trangthai = 1 and macha = ?")->loadrows([$macha]);
    }

    function capquyen($iduser, $chucnang)
    {
        $this->setquery("INSERT INTO `admin_permission`  VALUES (?,?)")->save([$iduser, $chucnang]);
    }

    function thuhoi($ma)
    {
        $this->setquery("delete from `admin_permission` where iduser = ?")->save([$ma]);
    }

    function checked($id, $machucnang)
    {
        return $this->setquery("select * from `admin_permission` where `admin_permission`.`iduser` = ? and `admin_permission`.`machucnang` = ?")->loadrow([$id, $machucnang]) ? true : false;
    }

    function danhsachchucnangtheouser($id, $macha)
    {
        return $this->setquery("select * from `admin_permission` a join `dynamic` d on a.`machucnang` = d.`ma` where a.`iduser` = ? and d.`macha`= ? and d.`hienmenu` = 1")->loadrows([$id, $macha]);
    }

    function isrole($id, $cl, $ac)
    {
        return $this->setquery("select * from `admin_permission` a join `dynamic` d on a.`machucnang` = d.`ma` where
        a.`iduser` = ? and link like ? ")->loadrow([$id, "%controller=" . $cl . "&action=" . $ac . "%"]) ? true : false;
    }

    // d.truy cập thì chưa vì bây giờ xét
    // vì nếu người dùng tự ý trỏ lên cái chức năng mà ko cho phép truy cập thì phải xét trạng thái truy cập
}