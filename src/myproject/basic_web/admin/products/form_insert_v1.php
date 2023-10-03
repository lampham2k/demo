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
    <link rel="stylesheet" href="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">
</head>
<body>
    <?php
        //bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/
        //link lấy tài liệu 
        require '../menu.php';
        include '../connect.php';
        $sql ="select * from nha_san_xuat";
        $result = mysqli_query($connect,$sql);
        // $each = mysqli_fetch_array($result);
    ?>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        <!-- allows to pass files in the form -->
        name
        <input type="text" name="name">
        <br>
        image
        <input type="file" name="photo">
        <br>
        price
        <input type="number" name="price">
        <br>
        description 
        <textarea name="description " id="" cols="30" rows="10"></textarea>
        <br>
        manufacturer_id
        <!-- multiple là chọn nhiều loại cùng 1 lúc. -->
        <select name="manufacturer_id" >
            <?php foreach ($result as $each): ?>
                <option value="<?php echo $each['ma'] ?>">
                    <?php echo $each['ten'] ?>
                </option>
            <?php endforeach ?>
        </select>
        <br>
        types
        <input type="text" name="type_names" id="type">
        <br>      
        <button>add</button>
    </form>
    <!-- bth thì jquery nên chèn trước các thư viện khác để tránh lỗi -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
    <script type="text/javascript" src="typeahead.bundle.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            // ngăn ngừa sự kiện 
            $("form").keypress(function(event) {
                if(event.keyCode === 13){
                    event.preventDefault();
                }
            });
            // https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/(showcode typeahead)
            var types = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'list_type.php?q=%QUERY',
                    wildcard: '%QUERY'
                }
                });

                $('#type').tagsinput({
                typeaheadjs: {
                    displayKey: 'name',
                    valueKey: 'name',
                    source: types
                    },
                    freeInput : true
                });
        });
    </script>
</body>
</html>