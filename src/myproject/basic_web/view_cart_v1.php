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
    $sum = 0;
    // lấy giỏ hàng về
    // sau đó sẽ in ra giỏ hàng trong 1 bảng
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
        <?php foreach ($cart as $id => $each): ?>
          <!-- vòng lặp lấy hàng có id tại từng sản phẩm  -->
        <!-- mảng $_SESSION'cart'; gán cho $cart có id với số lượng -->
       
        <tr>
            <td> <img src="admin/products/photos/<?php echo $each['photo'] ?>" height='100'> </td>
            <td><?php echo $each['name'] ?></td>
            <td><?php echo $each['price'] ?></td>
            <td>
                <a href="update_quantity.php?id=<?php echo $id ?>&type=decre">
                    -
                </a>
                <?php echo $each['quantity'] ?>
                <!-- 2 thẻ giống nhau chỉ thay đổi kiểu +- nên chỉ cần thêm type -->
                <a href="update_quantity.php?id=<?php echo $id ?>&type=incre">
                    +
                </a>
            </td>
            <td><?php
                $result = $each['quantity']  * $each['price'];
                echo $result;
                $sum += $result;
                // 3 dòng code trên có nghĩa là vòng lặp sẽ tính giá của từng sản phẩm 
                // rồi bỏ vào tổng chung 
             ?></td>
            <!-- tổng tiền lấy giá nhân với số lượng -->
            <td>
                <a href="delete_cart.php?id=<?php echo $id ?>">
                    remove
                </a>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
    <h1>
    total bill:
    $<?php echo $sum ?>
    </h1>
    <?php
    $id = $_SESSION['id'];
    require 'admin/connect.php';
    $sql ="select * from customers where id = '$id' ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    ?>
    <form action="process_checkout.php" method="post">
        name_receiver
        <input type="text" name="name_receiver" value='<?php echo $each['name'] ?>'><br>
        phone_receiver
        <input type="text" name="phone_receiver" value='<?php echo $each['phone_number'] ?>'><br>
        address_receiver
        <input type="text" name="address_receiver" value='<?php echo $each['address'] ?>'><br>
        <button>order</button>
    </form>
</body>
</html>
