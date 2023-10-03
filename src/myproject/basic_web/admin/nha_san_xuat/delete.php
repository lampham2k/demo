<?php
        require '../../check_super_admin.php';// kiểm tra nếu không có level thì sẽ điều hương về login 
        
        $ma = $_GET['ma'];
        include '../connect.php';

        $drop = "delete from nha_san_xuat
        where ma = $ma";
            

        mysqli_query($connect,$drop);
        mysqli_close($connect);
        header('location:index.php?success=xóa thành công');