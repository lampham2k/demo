<?php
session_start();
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
    $cart = $_SESSION['carts'];
    // lấy giỏ hàng về
    // sau đó sẽ in ra giỏ hàng trong 1 bảng
    require 'admin/connect.php';
    ?>
    <table border="1" width="100%">
        <tr>
            <th>photo</th>
            <th>Product's name</th>
            <th>price</th>
            <th>amount</th>
            <th>total money</th>
            <th>remove</th>
        </tr>
        <?php foreach ($cart as $id => $quantity): ?>
        <!-- mảng $_SESSION'cart'; gán cho $cart có id với số lượng -->
        <?php 
        $sql = "select * from products
        where id = '$id' ";
        // tại sao xuống dưới này mới lấy ra sql , tại vì ở dưới này mới khai báo id
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
        // vòng lặp lấy ra id sản phẩm . từ đó lấy ra số lượng để in ra bên dưới
        ?>
        <tr>
            <td> <img src="admin/products/photos/<?php echo $each['photo'] ?>" height='100'> </td>
            <td><?php echo $each['name'] ?></td>
            <td><?php echo $each['price'] ?></td>
            <td><?php echo $quantity ?></td>
            <td><?php echo $quantity * $each['price'] ?></td>
            <!-- tổng tiền lấy giá nhân với số lượng -->
        </tr>
    <?php endforeach ?>
    </table>
</body>
</html>
