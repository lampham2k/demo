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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
        #tong{
            background:black;
            width: 100%;
            height:800px;
        }
        #tren{
            background:yellow;
            width: 100%;
            height:20%;
        }
        #giua{
            background:blue;
            width: 100%;
            height:60%;
        }
        #duoi{
            background:purple;
            width: 100%;
            height:20%;
        }
    </style>
</head>
<body>
    <div id="tong">
        <?php include 'menu_v1.php'; ?>
        <?php include 'products.php'; ?>
        <?php include 'footer.php'; ?>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>                   <!-- chèn thư viện jquery vào -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>            
    <script src="https://jqueryvalidation.org/files/lib/jquery.form.js"></script>                                                <!-- chèn thêm form vào --> 
    <!-- đẩy xuống dưới này tại vì thằng menu phải được load thì thằng js mới chạy. -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">     
    </script> -->
    <script type="text/javascript">
    $(document).ready(function(){
        $(".btn-add-to-cart").click(function(){ // click là khi được bấm 
            // alert'nút được bấm rồi';
            let id = $(this).data('id');
            // this là cái nút data là dữ liệu từ nút , id là tên khai báo từ file đã khai báo.
            // alert'bạn đã chọn sản phẩm có id: ' + id;
            $.ajax({
                url: 'add_to_cart_v1.php',
                type: 'GET',
                // dataType: 
                data: {id},
            })
            .done(function(response){ // hàm chạy thành công thì in ra , response là tên hàm muốn đặt ntn cũng dc.
                if(response == 1){
                    alert("success");
                } else {
                    alert(response);
                }
            })
        });
    });
    // đoạn code trên là để chạy hết tài liệu html xong mới chạy js
    </script>
</body>
</html>