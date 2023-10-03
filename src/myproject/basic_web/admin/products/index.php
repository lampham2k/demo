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
        $sql ="select products.*,
        nha_san_xuat.ten as ten_sx
        from products join nha_san_xuat on products.manufacturer_id = nha_san_xuat.ma";
        $result = mysqli_query($connect,$sql);
        // $each = mysqli_fetch_array($result);
    ?>
    <h1> Product Management </h1>
    <a href="form_insert.php">
        add
    </a>
    <br>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>photo</th>
            <th>price</th>
            <th>Manufacturers Name</th>
            <th>description</th>
            <th>manufacturer_id</th>
            <th>update</th>
            <th>remove</th>
        </tr>
        <?php foreach ($result as $each_result ){ ?>
            <!--foreach vòng lặp chuyên duyệt mảng -->
            <tr>
                <td>
                    <?php echo $each_result['id'] ?>
                </td>
                <td>
                    <?php echo $each_result['name'] ?>
                </td>
                <td>
                    <img src="photos/<?php echo $each_result['photo'] ?>" height="100">
                </td>
                <td>
                    <?php echo $each_result['price'] ?>
                </td>
                <td>
                    <?php echo $each_result['ten_sx'] ?>
                </td>
                <td>
                    <?php echo $each_result['description'] ?>
                </td>
                <td>
                    <?php echo $each_result['manufacturer_id'] ?>
                </td>
                <td>
                    <a href="form_update.php?id=<?php echo $each_result['id'] ?>">
                    <!-- vòng lặp cho nên sẽ chuyền vào mã tại vị trí này -->
                        updates
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each_result['id'] ?>">
                    <!-- vòng lặp cho nên sẽ chuyền vào mã tại vị trí này -->
                        delete
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>