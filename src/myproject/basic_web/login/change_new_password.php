<?php
    $token = $_GET['token'];
    // lấy ra token đã chuyền ở trong link.
    require '../connect.php';
    $sql = " select * from forgot_password where token = $token ";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result !== 1)){
        header('location:index.php?error=syntax error');
        exit;
    }
    // ktra xem có token kh cần thay đổi mật khẩu thì sẽ chạy tiếp k thì điều hướng lại.
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
    <form action="process_change_newpw.php" method="post">
        <input type="hide" name="token" value="<?php echo $token ?>">
        new password
        <input type="password" name="new_password">
        <button>accept</button>
    </form>
</body>
</html>