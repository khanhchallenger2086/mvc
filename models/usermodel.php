<?php
class usermodel extends general
{
    public $table = "adminstration";
    function login_get_row($us, $ps)
    {
        return $this->setquery("select * FROM `" . $this->table . "` WHERE tendangnhap = ? and matkhau = ?")->loadrow([$us, $ps]);
    }

    function list_user()
    {
        return $this->setquery("sELECT * FROM `" . $this->table . "`")->loadrows();
    }

    function get_user($ma)
    {
        return $this->setquery("sELECT * FROM `" . $this->table . "`WHERE `ma`= ? and `trangthai` = 1")->loadrow([$ma]);
    }
}