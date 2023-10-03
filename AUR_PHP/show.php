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
        include 'connect.php';
        $sql = "select * from tin_tuc
        where ma = $ma";
        $result = mysqli_query($connect , $sql);
        $show_news = mysqli_fetch_array($result);
        // lấy thằng thứ nhất ở trong mảng
    ?>
    <h1>
        <?php echo $show_news['tieu_de'] ?>
    </h1>
    <p>
        <?php echo nl2br($show_news['noi_dung']) ?>
    </p>
    <img src="<?php echo $show_news['anh'] ?>" height="100">
</body>
</html>