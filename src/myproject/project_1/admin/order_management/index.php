<?php
require '../product/check_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../index.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <style type="text/css">
        #page{
            width: 100%;
            height:1200px;
        }
        #header{
            width: 100%;
            height:20%;
        }
        #content{
            background:#E3E3E3;
            width: 100%;
            height:80%;
        }
        #content-left{
            float:left;
            width: 15%;
            height:100%;
        }
        #content-right{
            float:left;
            width: 85%;
            height:100%;
        }

        /* update table */
        th, td {
        border-bottom: 1px solid #ddd;
        padding: 15px;
        text-align: left;
        }        
        /* update img */
        .button {
        background-color: #555555;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        }            
    </style>
</head>
<body>
    <div id ="page">
        <?php include '../header.php'; ?>
        <div id="content">
            <?php 
                include '../content.php';        
            ?>
            <div id="content-right">
            <?php
                include '../../connect.php';
                $sql ="select orders.*, 
                customers.name,
                customers.phone,
                customers.address
                from orders
                join customers
                on customers.id = orders.customer_id ";
                $result = mysqli_query($connect,$sql);         
            ?>
            <a class="button" href="index.php?status=1">xem đơn hàng đã duyệt</a>&nbsp;&nbsp;&nbsp;
            <a class="button" href="index.php?status=2">xem đơn hàng đã hủy</a>&nbsp;&nbsp;&nbsp;
            <a class="button" href="index.php?status=0">xem đơn hàng mới</a>
            <table width="100%">
                <tr>
                    <th>code orders</th>
                    <th>time set</th>
                    <th>receiver's information</th>
                    <th>information booker</th>
                    <th>status</th>
                    <th>total money</th>
                    <th>detail</th>
                    <th>permission</th>
                </tr>
                <?php foreach($result as $each): ?>
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
                            <?php echo $each['phone'] ?>
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
                            ?>
                        </td>
                        <td>
                            <?php echo $each['total_price'] ?>
                        </td>
                        <td>
                            <a class="button" href="detail.php?id=<?php echo $each['id'] ?>">
                                detail
                            </a>
                            <!-- nút xem bản chất là thẻ a để nhảy qua trang khác để xem. -->
                        </td>
                        <td>
                            <a class="button" style="<?php if($each['status'] == 2){ ?> display: none; <?php } ?>" href="update.php?id=<?php echo $each['id'] ?>&status=1">
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
                            <a class="button" style="<?php if($each['status'] == 1){ ?> display: none; <?php } ?>" href="update.php?id=<?php echo $each['id'] ?>&status=2">
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
            </div>
        </div>
    </div>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script src="../../index.js"></script>
</body>
</html>