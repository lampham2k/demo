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
</head>
<body>
    <?php
    $cart = $_SESSION['carts'];
    $total = 0;
    // lấy giỏ hàng về
    // sau đó sẽ in ra giỏ hàng trong 1 bảng
    ?>
    <table border="1" width="100%">
        <tr>
            <th>photo</th>
            <th>Product's name</th>
            <th>price</th>
            <th>amount</th>
            <th>total money</th>
            <th>remove</th>
        </tr>
        <?php foreach ($cart as $id => $each): ?>
          <!-- vòng lặp lấy hàng có id tại từng sản phẩm  -->
        <!-- mảng $_SESSION'cart'; gán cho $cart có id với số lượng -->
       
        <tr>
            <td> <img src="admin/products/photos/<?php echo $each['photo'] ?>" height='100'> </td>
            <td><?php echo $each['name'] ?></td>
            <td>
                <span class="span-price">
                    <?php echo $each['price'] ?>
                    <!-- thường thì thầy sẽ để trong thẻ span -->
                </span>
            </td>
            <td>
                <button class="btn-update-quantity" data-id='<?php echo $id ?>'
                data-type='0'>  
                    -
                </button>
                <span class="span-quantity">
                    <?php echo $each['quantity'] ?>
                    <!-- thường thì thầy sẽ để trong thẻ span -->
                </span>
                <!-- 2 thẻ giống nhau chỉ thay đổi kiểu +- nên chỉ cần thêm type -->
                <button class="btn-update-quantity" data-id='<?php echo $id ?>'
                data-type='1'> 
                    +
                </button>
            </td>
            <td>
                <!-- tính total_money bằng js -->
                <span class="span-sum">
                    <?php
                        $sum = $each['quantity'] * $each['price'];
                        $total += $sum;
                        echo $sum;
                    ?>
                </span>
            </td>
            <!-- tổng tiền lấy giá nhân với số lượng -->
            <td>
                <button class="btn-delete" data-id='<?php echo $id ?>'> 
                    remove
                </button>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
    <h1 class ="total_bill"> 
    <!-- tạo class để chuyền xuống dưới để xử lý -->
    total bill:
    $
    <span id="span-total">
    <?php echo $total ?>
    </span>
    </h1>
    <?php
    $id = $_SESSION['id'];
    require 'admin/connect.php';
    $sql ="select * from customers where id = '$id' ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    ?>
    <form action="process_checkout.php" method="post">
        name_receiver
        <input type="text" name="name_receiver" value='<?php echo $each['name'] ?>'><br>
        phone_receiver
        <input type="text" name="phone_receiver" value='<?php echo $each['phone_number'] ?>'><br>
        address_receiver
        <input type="text" name="address_receiver" value='<?php echo $each['address'] ?>'><br>
        <button>order</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">     
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".btn-update-quantity").click(function(){ // click là khi được bấm 
            // alert'nút được bấm rồi';
            let btn = $(this);
            let id = btn.data('id');
            let type = parseInt(btn.data('type'));
            $.ajax({
                url: 'update_quantity.php',
                type: 'GET',
                // dataType: 
                data: {id,type},
            })
            .done(function(){ 
                let parent_tr = btn.parents('tr'); // parent là gọi tới thằng cha gần nhất , còn parents là gọi tới thằng cha sâu hơn.
                let price = parent_tr.find('.span-price').text();
                let quantity = parent_tr.find('.span-quantity').text();
                if(type == 1){
                    quantity++;
                } else {
                    quantity--;
                }
                if(quantity === 0){ // nếu số lượng về 0 thì...
                    parent_tr.remove(); // gọi tới dòng tr và xóa nó đi.
                } else {
                    parent_tr.find('.span-quantity').text(quantity);
                    let sum = price * quantity;
                    parent_tr.find('.span-sum').text(sum);
                    // từ nút ấn vào sẽ lấy từ cha đã chọn rồi tìm class và gọi đến text để lấy dữ liệu của nó.
                }
                getTotal();
            });
        });
        $(".btn-delete").click(function(){
            let btn = $(this);
            let id = btn.data('id');
            $.ajax({
                url: 'delete_cart.php',
                type: 'GET',
                // dataType: 
                data: {id},
            })
            .done(function(){ 
                btn.parents('tr').remove();
                getTotal();
            });
            function getTotal(){ // vì hàm này có thể tách biệt và cái này sẽ được sử dụng lại .
                let total = 0;
                $(".span-sum").each(function(){ // hàm vòng lặp 
                total += parseFloat($(this).text()); // parseFloat là ép kiểu 
                })
                $("#span-total").text(total);
                // từ nút ấn vào sẽ lấy từ cha đã chọn rồi tìm class và gọi đến text để lấy dữ liệu của nó.
            }
        });
    });
    // đoạn code trên là để chạy hết tài liệu html xong mới chạy js
    </script>
</body>
</html>
