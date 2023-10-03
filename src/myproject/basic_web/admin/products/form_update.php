<?php
    require '../../check_admin_login.php';// kiểm tra nếu không có level thì sẽ điều hương về login 

    if(empty($_GET['id'])){ 
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
        $id = $_GET['id'];
        include '../menu.php';
        require '../connect.php';
        // chèn 1 file vào nhưng vẫn chạy bth dc 
        $sql = "select * from products
        where id = '$id'";
        $result = mysqli_query($connect , $sql);

        $sql = "select * from nha_san_xuat";
        $nha_san_xuat = mysqli_query($connect , $sql);

        $number_rows = mysqli_num_rows($result);
        // Return the number of rows in result set
        if($number_rows == 1){
            $new = mysqli_fetch_array($result);
?>
    <form method="post" action="process_update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $new['id'] ?>">
        <!-- ẩn đi input -->
        name
        <input type="text" name="name" value="<?php echo $new['name'] ?>">
        <br>
        change photo
        <input type="file" name="photo_new">
        <br>
        old picture
        <img src="photos/<?php echo $new['photo'] ?>" height="100" alt="">
        <input type="hidden" name="photo_old" value="<?php echo $new['photo'] ?>">
        <br>
        price
        <input type="number" name="price" value="<?php echo $new['price'] ?>">
        <br>
        description 
        <textarea name="description " id="" cols="30" rows="10" value="<?php echo $new['description'] ?>"></textarea>
        <br>
        manufacturer_id
        <select name="manufacturer_id" id="">
            <?php foreach ($nha_san_xuat as $each): ?>
                <option value="<?php echo $each['ma'] ?>"
                <?php if($new['manufacturer_id'] == $each['ma'] ){ ?>
                        selected
                <?php } ?>
                >
                    <?php echo $each['ten'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        <button>add</button>
    </form>
    <?php } else{ ?>
        <h1> not found under this code </h1>
    <?php } ?>
</body>
</html>