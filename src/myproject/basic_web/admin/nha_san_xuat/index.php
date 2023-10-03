<?php
require '../../check_super_admin.php';// kiểm tra nếu không có level thì sẽ điều hương về login 
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
    đây là khu vực quản lý nhà sx
    <br>
    <a href="form_insert.php">
        add
    </a>
    <?php
     include '../menu.php';
     require '../connect.php';
     $sql ="select * from nha_san_xuat";
     $result = mysqli_query($connect,$sql);
    ?>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>address</th>
            <th>phone</th>
            <th>image</th>
            <th>update</th>
            <th>remove</th>
        </tr>
        <?php foreach ($result as $each_result ){ ?>
            <!--foreach vòng lặp chuyên duyệt mảng -->
            <tr>
                <td>
                    <?php echo $each_result['ma'] ?>
                </td>
                <td>
                    <?php echo $each_result['ten'] ?>
                </td>
                <td>
                    <?php echo $each_result['dia_chi'] ?>
                </td>
                <td>
                    <?php echo $each_result['sdt'] ?>
                </td>
                <td>
                    <img src="<?php echo $each_result['anh'] ?>" height="100">
                </td>
                <td>
                    <a href="form_update.php?ma=<?php echo $each_result['ma'] ?>">
                    <!-- vòng lặp cho nên sẽ chuyền vào mã tại vị trí này -->
                        updates
                    </a>
                </td>
                <td>
                    <a href="delete.php?ma=<?php echo $each_result['ma'] ?>">
                    <!-- vòng lặp cho nên sẽ chuyền vào mã tại vị trí này -->
                        delete
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>