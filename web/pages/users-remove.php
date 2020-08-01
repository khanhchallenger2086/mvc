<?php
    include 'core/core-users.php';

    if (!isset($_GET['id'])) {
        header('location:index.php?click=users');
    }

    if (isset($array[$_GET['id']])) {
        $xuly = new xulyfile($array,$_GET['id'],$_POST['name_access'],$_POST['full_name'],$_POST['email'],$path);
        update_data('data/users-data.txt',$xuly->remove());
        header('location:index.php?click=users');
    }
?>