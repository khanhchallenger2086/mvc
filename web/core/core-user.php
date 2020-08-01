<?php
    class user extends database {
        function login_get_row($us,$ps) {
            return $this->setquery("select * FROM `adminstration` WHERE tendangnhap = ? and matkhau = ?")->loadrow([$us,$ps]);
        }
    }
?>