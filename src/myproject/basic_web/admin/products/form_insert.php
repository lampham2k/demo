<?php
require '../../check_admin_login.php';// kiểm tra nếu không có level thì sẽ điều hương về login 
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
        require '../menu.php';
        include '../connect.php';
        $sql ="select * from nha_san_xuat";
        $result = mysqli_query($connect,$sql);
        // $each = mysqli_fetch_array($result);

        // liệt kê tất cả thể loại
        $sql ="select * from types";
        $result_type = mysqli_query($connect,$sql);
    ?>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        <!-- allows to pass files in the form -->
        name
        <input type="text" name="name">
        <br>
        image
        <input type="file" name="photo">
        <br>
        price
        <input type="number" name="price">
        <br>
        description 
        <textarea name="description " id="" cols="30" rows="10"></textarea>
        <br>
        manufacturer_id
        <!-- multiple là chọn nhiều loại cùng 1 lúc. -->
        <select name="manufacturer_id" id="" >
            <?php foreach ($result as $each): ?>
                <option value="<?php echo $each['ma'] ?>">
                    <?php echo $each['ten'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        types
        <select name="type_id[]" multiple>
            <?php foreach ($result_type as $each): ?>
                <option value="<?php echo $each['id'] ?>">
                    <?php echo $each['name'] ?>
                </option>
            <?php endforeach ?>
        </select>  
        <br>      
        <button>add</button>
    </form>
</body>
</html>