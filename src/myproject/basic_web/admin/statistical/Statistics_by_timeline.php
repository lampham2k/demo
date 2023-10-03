<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Statistics_by_timeline.php" method="get">
    chọn thời gian
    <input type="date" name="date" value="<?php echo date('y-m-d'); ?>">
    <input type="week" name="week" value="<?php echo date('y-m-d'); ?>">
    <input type="month" name="month" value="<?php echo date('y-m-d'); ?>">
    <select name="year" id="">
        <!-- dùng vòng lặp for để chọn năm -->
        <?php for($i = date('Y') ; $i >= 1970 ; $i--){ ?>
        <option value="">
            <?php echo $i; ?>
        </option>
        <?php } ?>
    </select>
    <button>statistic</button>
    </form>
    <?php
    $date = $_GET['date'];
    $week = $_GET['week'];
    $month = $_GET['month'];
    $year = $_GET['year'];
    require '../connect.php';
    $sql = "select * from orders 
    where created_at = '$date' or created_at = '$week' or created_at = '$month' or created_at = '$year' 
    ";
    $result = mysqli_query($connect,$sql);
    ?>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>customer_id</th>
            <th>status</th>
            <th>created_at</th>
            <th>total_price</th>
        </tr>
        <?php foreach ($result as $each_result ){ ?>
            <!--foreach vòng lặp chuyên duyệt mảng -->
            <tr>
                <td>
                    <?php echo $each_result['id'] ?>
                </td>
                <td>
                    <?php echo $each_result['customer_id'] ?>
                </td>
                <td>
                    <?php echo $each_result['status'] ?>
                </td>
                <td>
                    <?php echo $each_result['created_at'] ?>
                </td>
                <td>
                    <?php echo $each_result['total_price'] ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>