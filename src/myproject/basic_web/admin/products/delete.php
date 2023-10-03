<?php
        require '../../check_admin_login.php';// kiểm tra nếu không có level thì sẽ điều hương về login 
        
        $id= $_GET['id'];
        include '../connect.php';

        $drop = "delete from products
        where id = $id";
            

        mysqli_query($connect,$drop);
        mysqli_close($connect);
        
        header('location:index.php?success=xóa thành công');