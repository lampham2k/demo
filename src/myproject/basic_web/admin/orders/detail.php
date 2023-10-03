<?php
require '../../check_admin_login.php';
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
    $order_id = $_GET['id'];
    require '../connect.php';
    $sql = "select * from order_product
    join products on products.id = order_product.product_id 
    where order_id = '$order_id'
    ";
    $result = mysqli_query($connect,$sql);
    $sum = 0;
    ?>
    <table border="1" width="100%">
        <tr>
            <th>photo</th>
            <th>Product's name</th>
            <th>price</th>
            <th>amount</th>
            <th>total money</th>
        </tr>
        <?php foreach ($result as $each): ?>  
            <tr>
                <td> <img src="../products/photos/<?php echo $each['photo'] ?>" height='100'> </td>
                <td><?php echo $each['name'] ?></td>
                <td><?php echo $each['price'] ?></td>
                <td>
                    <?php echo $each['quantity'] ?>
                </td>
                <td>
                    <?php
                    $result = $each['quantity']  * $each['price'];
                    echo $result;
                    $sum += $result;
                    // 3 dòng code trên có nghĩa là vòng lặp sẽ tính giá của từng sản phẩm 
                    // rồi bỏ vào tổng chung 
                    ?>
                </td>
                <!-- tổng tiền lấy giá nhân với số lượng -->
            </tr>
    <?php endforeach ?>
    </table>
    <h1>
    total bill:
    $<?php echo $sum ?>
    </h1>
</body>
</html>