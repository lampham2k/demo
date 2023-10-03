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
    <link rel="stylesheet" type="text/css" href="../index.css">
    <style type="text/css">
        #page{
            width: 100%;
            height:1000px;
        }        
        #header{
            /* background:blue; */
            width: 100%;
            height:15%;
        }
        #content{
            background:#E3E3E3;
            width: 100%;
            height:85%;
        }
        #content-left{
            /* background:blue; */
            float:left;
            width: 40%;
            height:100%;
        }
        #content-right{
            /* background:black; */
            float:left;
            width: 60%;
            height:100%;
        }
        img { 
        display: block;
        max-height:100px;
        max-width:100%;
        width: auto;
        height: auto;
        }
        .btn {
        background-color: #555555;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        }
        th, td {
        border-bottom: 1px solid #ddd;
        padding: 15px;
        text-align: left;
        }                
    </style>
</head>
<body>
    <div id="page">
    <?php include 'header.php';
    $cart = $_SESSION['carts'];
    $total = 0;
    $id = $_SESSION['id'];
    require '../connect.php';
    $sql ="select * from customers where id = '$id' ";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    ?>
    <div id="content">
    <div id="content-left">
    <form action="process_checkout.php" method="post">
        name_receiver<br>
        <input type="text" name="name_receiver" value='<?php echo $each['name'] ?>'><br>
        phone_receiver<br>
        <input type="text" name="phone_receiver" value='<?php echo $each['phone'] ?>'><br>
        address_receiver<br>
        <input type="text" name="address_receiver" value='<?php echo $each['address'] ?>'><br><br>
        <button class="button btn">order</button>
    </form>
    </div>
    <div id="content-right">
    <table width="100%">
        <tr>
            <th>photo</th>
            <th>Product's name</th>
            <th>price</th>
            <th>amount</th>
            <th>total money</th>
            <th>cancel</th>
        </tr>
        <?php if(isset($cart)){ ?>
        <?php foreach ($cart as $id => $each): ?>
        <tr>
            <td> <img src="../admin/product/photos/<?php echo $each['photo'] ?>"> </td>
            <td><?php echo $each['name'] ?></td>
            <td>
                <span class="span-price">
                    <?php echo $each['price'] ?>
                </span>
            </td>
            <td>
                <button class="btn-update-quantity" data-id='<?php echo $id ?>'
                data-type='0'>  
                    -
                </button>
                <span class="span-quantity">
                    <?php echo $each['quantity'] ?>
                </span>
                <button class="btn-update-quantity" data-id='<?php echo $id ?>'
                data-type='1'> 
                    +
                </button>
            </td>
            <td>
                <span class="span-sum">
                    <?php
                        $sum = $each['quantity'] * $each['price'];
                        $total += $sum;
                        echo $sum;
                    ?>
                </span>
            </td>
            <td>
                <button class="btn-delete" data-id='<?php echo $id ?>'> 
                    remove
                </button>
            </td>
        </tr>
    <?php endforeach ?>
    <?php } else {?>
        <h1>GIỎ HÀNG TRỐNG TRƠN</h1>
    <?php }?>
    </table>
    <h1 class ="total_bill"> 
    total bill:
    $
    <span id="span-total">
    <?php echo $total ?>
    </span>
    </h1>
    </div>
    
    </main>

    <div class="c-author">
    Cảm ơn bạn vì đã ghé thăm 💛 &nbsp;
    </div>

    </div>
    </div>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../index.js"></script>
    <script src="../notify.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".btn-update-quantity").click(function(){ 
            let btn = $(this);
            let id = btn.data('id');
            let type = parseInt(btn.data('type'));
            $.ajax({
                url: 'update_quantity.php',
                type: 'GET',
                data: {id,type},
            })
            .done(function(){ 
                let parent_tr = btn.parents('tr');
                let price = parent_tr.find('.span-price').text();
                let quantity = parent_tr.find('.span-quantity').text();
                if(type == 1){
                    quantity++;
                } else {
                    quantity--;
                }
                if(quantity === 0){ 
                    parent_tr.remove();
                } else {
                    parent_tr.find('.span-quantity').text(quantity);
                    let sum = price * quantity;
                    parent_tr.find('.span-sum').text(sum);
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
                data: {id},
            })
            .done(function(){ 
                btn.parents('tr').remove();
                getTotal();
            });
        });
        function getTotal(){ 
                let total = 0;
                $(".span-sum").each(function(){
                total += parseFloat($(this).text()); 
                })
                $("#span-total").text(total);
            }
    });           
    </script>
</body>
</html>