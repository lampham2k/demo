<?php
        require 'check_super_admin.php';
        
        $id = $_GET['id'];
        include '../../connect.php';

        $drop = "delete from manufacturer
        where id = $id";
            

        mysqli_query($connect,$drop);
        mysqli_close($connect);
        header('location:index.php?success=delete success');