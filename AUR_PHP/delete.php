<?php
        $ma = $_GET['ma'];
        include 'connect.php';

        $drop = "delete from tin_tuc
        where ma = $ma";
            

        mysqli_query($connect,$drop);