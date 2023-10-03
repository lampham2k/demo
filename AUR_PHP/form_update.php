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
        // chèn 1 file vào nhưng vẫn chạy bth dc 
        $sql = "select * from tin_tuc
        where ma = $ma";
        $result = mysqli_query($connect , $sql);
        $news = mysqli_fetch_array($result);
    ?>
    <form method="post" action="process_update.php">
        <input type="hidden" name="ma" value="<?php echo $ma ?>">
        <!-- ẩn đi input -->
        title
        <input type="text" name="title" value="<?php echo $news['tieu_de'] ?>">
        <br>
        content
        <br>
        <textarea name="content" id="" cols="30" rows="10" >
            <?php echo $news['noi_dung'] ?>
        </textarea>
        <br>
        link photos
        <input type="text" name="photos" value="<?php echo $news['anh'] ?>">
        <br>
        <button>update</button>
    </form>
</body>
</html>