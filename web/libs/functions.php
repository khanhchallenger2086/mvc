<?php
    session_start();
    
    function thongbao($txt) {
        return $thongbao =  '<div class="alert alert-danger">'.$txt.'</div>';
    }

    function islogin() {
        if (isset($_SESSION['login']) && $_SESSION['login']) {
            return true;
        }
        return false;
    }

    function xemmang($array) {
        echo '<pre>',print_r($array),'</pre>';
    }
?>