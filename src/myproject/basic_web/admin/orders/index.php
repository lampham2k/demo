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
require '../connect.php';
$sql ="select orders.*, 
customers.name,
customers.phone_number,
customers.address
from orders
join customers
on customers.id = orders.customer_id ";
$result = mysqli_query($connect,$sql);
?>
<table border="1" width="100%">
    <tr>
        <th>code orders</th>
        <th>time set</th>
        <th>receiver's information</th>
        <th>information booker</th>
        <th>status</th>
        <th>total money</th>
        <th>view</th>
        <th>permission</th>
    </tr>
    <?php foreach ($result as $each): ?>
        <tr>
            <td>
                <?php echo $each['id'] ?>
            </td>
            <td>
                <?php echo $each['created_at'] ?>
            </td>
            <td>
                <?php echo $each['name_receiver'] ?>
                <?php echo $each['phone_receiver'] ?>
                <?php echo $each['address_receiver'] ?>
            </td>
            <td>
                <?php echo $each['name'] ?>
                <?php echo $each['phone_number'] ?>
                <?php echo $each['address'] ?>
            </td>
            <td>
                <?php
                    switch($each['status']){
                        case '0':
                            echo "recently booked";
                            break;
                        case '1':
                            echo "approved";
                            break;
                        case '2':
                            echo "cancel";
                            break;
                    }
                    // trạng thái dùng vòng lặp switch nhanh hơn if else vì nó có nhiều trường hợp.
                 ?>
            </td>
            <td>
                <?php echo $each['total_price'] ?>
            </td>
            <td>
                <a href="detail.php?id=<?php echo $each['id'] ?>">
                    view
                </a>
                <!-- nút xem bản chất là thẻ a để nhảy qua trang khác để xem. -->
            </td>
            <td>
                <a href="update.php?id=<?php echo $each['id'] ?>&status=1">
                    <?php 
                        switch($each['status']){
                            case '0':
                                echo "accept";
                                break;
                            case '1':
                                echo "cancel";
                                break;
                        }
                    ?>
                </a>
                <!-- nút xem bản chất là thẻ a để nhảy qua trang khác để xem. -->
                <a href="update.php?id=<?php echo $each['id'] ?>&status=2">
                    <?php 
                        switch($each['status']){
                            case '0':
                                echo "cancel";
                                break;
                            case '2':
                                echo "accept";
                                break;
                        }
                    ?>
                </a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
</body>
</html>