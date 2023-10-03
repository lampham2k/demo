<?php
    require '../../check_super_admin.php';
    if(empty($_GET['ma'])){ 
        header('location:index.php?error=lỗi k có id');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $ma = $_GET['ma'];
        include '../menu.php';
        require '../connect.php';
        // chèn 1 file vào nhưng vẫn chạy bth dc 
        $sql = "select * from nha_san_xuat
        where ma = '$ma'";
        $result = mysqli_query($connect , $sql);
        $number_rows = mysqli_num_rows($result);
        // Return the number of rows in result set
        if($number_rows == 1){
            $new = mysqli_fetch_array($result);
?>
    <form method="post" action="process_update.php">
        <input type="hidden" name="ma" value="<?php echo $new['ma'] ?>">
        <!-- ẩn đi input -->
        name
        <input type="text" name="name" value="<?php echo $new['ten'] ?>">
        <br>
        address
        <br>
        <textarea name="address" id="" cols="30" rows="10" >
            <?php echo $new['dia_chi'] ?>
        </textarea>
        <br>
        phone
        <input type="text" name="phone" value="<?php echo $new['sdt'] ?>">
        <br>
        image
        <input type="text" name="image" value="<?php echo $new['anh'] ?>">
        <br>
        <button>update</button>
    </form>
    <?php } else{ ?>
        <h1> not found under this code </h1>
    <?php } ?>
</body>
</html>