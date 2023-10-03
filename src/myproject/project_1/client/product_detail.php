<?php
session_start();
unset($_SESSION['quantitys']);
if(empty($_SESSION['id'])){
    header('location:index.php?error=please log in');
    exit;
}
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
        max-height:200px;
        max-width:100%;
        width: auto;
        height: auto;
        }
        .button {
        background-color: #555555;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        }                 
    </style>
</head>
<body>
    <div id="page">
    <?php include 'header.php';
    $id = $_GET['id'];
    require '../connect.php';
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    ?>
    <div id="content">
        <div id="content-left">
            <img src="../admin/product/photos/<?php echo $each['photo']; ?>">
        </div>
        <div id="content-right">
            <h1><?php echo $each['name']; ?></h1>
            <p><?php echo $each['price']; ?>$</p>
            <p><?php echo $each['description']; ?></p><br>
            <div class="quantity">
            quantity&nbsp;&nbsp;
                    <button class="btn-update-quantity" data-id='<?php echo $id ?>'
                    data-type='0'>  
                        -
                    </button>
                    <span class="span-quantity">
                        1
                    </span>
                    <button class="btn-update-quantity" data-id='<?php echo $id ?>'
                    data-type='1'> 
                        +
                    </button><br><br>
                    <button data-id='<?php echo $each['id'];?>' class='btn-add-to-cart button'>
                        add to cart
                    </button>
            </div>
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
            $(".btn-add-to-cart").click(function(){ 
            let id = $(this).data('id');
            $.ajax({
                url: 'add_to_cart.php',
                type: 'GET',
                data: {id},
            })
            .done(function(response){ 
                if(response == 1){
                    $.notify("successfully", "success");
                } else {
                    alert(response);
                }
                })
            });
            $(".btn-update-quantity").click(function(){ 
                let btn = $(this);
                let id = btn.data('id');
                let type = parseInt(btn.data('type'));
                $.ajax({
                    url: 'temporary_quantity.php',
                    type: 'GET', 
                    data: {id,type},
                })
                .done(function(){
                    let parents = btn.parents('.quantity');
                    let quantity = parseInt(parents.find(".span-quantity").text());
                    if(type == 0){
                        if(quantity == 1){
                            preventDefault();
                        }
                        quantity--;
                    } else {
                        quantity++;
                    }
                    parents.find('.span-quantity').text(quantity);
                });
            });
        });
    </script>
</body>
</html>