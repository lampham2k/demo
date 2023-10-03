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
    <link
      rel="stylesheet"
      type="text/css"
      href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css"
    />
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
            float:right;
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
        fieldset,
        label {
            margin: 0;
            padding: 0;
        }
        /* body {
            margin: 20px;
        }
        h1 {
            font-size: 1.5em;
            margin: 10px;
        } */

        /****** Style Star Rating Widget *****/

        .rating {
            border: none;
            float: left;
        }

        .rating > input {
            display: none;
        }
        .rating > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating > label {
            color: #ddd;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating > input:checked ~ label, /* show gold star when clicked */
            .rating:not(:checked) > label:hover, /* hover current star */
            .rating:not(:checked) > label:hover ~ label {
            color: #ffd700;
        } /* hover previous stars in list */

        .rating > input:checked + label:hover, /* hover current star when changing rating */
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label, /* lighten current selection */
            .rating > input:checked ~ label:hover ~ label {
            color: #ffed85;
        }               
    </style>
</head>
<body>
    <div id="page">
    <?php include 'header.php';
    $id = $_SESSION['id'];
    require '../connect.php';

    $sql ="select orders.* , products.id as 'p_id' , products.name , products.photo , products.description  , order_product.quantity as 'quantity' from orders
    join order_product on orders.id = order_product.order_id 
    join products on order_product.product_id = products.id 
    where customer_id = '$id' and status = 1";
    $result = mysqli_query($connect,$sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows >= 1){
    ?>
    <div id="content">
        <div class="content-left">
            <?php foreach($result as $each):?>
                <h1><?php echo $each['name'] ?></h1>
                <p><?php echo $each['created_at'] ?></p>
                <p><?php echo $each['description'] ?></p>
                <img src="../admin/product/photos/<?php echo $each['photo']?>">
                <p><?php echo $each['quantity'] ?></p>
                <p>giao hàng thành công</p>
                <form action="">
                    <textarea name="comment" id="" cols="25" rows="2" placeholder="bình luận về sản phẩm..." ></textarea>
                    <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label
                    class="full"
                    for="star5"
                    title="Awesome - 5 stars"
                    ></label>
                    <input type="radio" id="star4half" name="rating" value="4.5" /><label
                    class="half"
                    for="star4half"
                    title="Pretty good - 4.5 stars"
                    ></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label
                    class="full"
                    for="star4"
                    title="Pretty good - 4 stars"
                    ></label>
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label
                    class="half"
                    for="star3half"
                    title="Meh - 3.5 stars"
                    ></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label
                    class="full"
                    for="star3"
                    title="Meh - 3 stars"
                    ></label>
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label
                    class="half"
                    for="star2half"
                    title="Kinda bad - 2.5 stars"
                    ></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label
                    class="full"
                    for="star2"
                    title="Kinda bad - 2 stars"
                    ></label>
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label
                    class="half"
                    for="star1half"
                    title="Meh - 1.5 stars"
                    ></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label
                    class="full"
                    for="star1"
                    title="Sucks big time - 1 star"
                    ></label>
                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label
                    class="half"
                    for="starhalf"
                    title="Sucks big time - 0.5 stars"
                    ></label>
                </fieldset>
                <br>
                <button>đánh giá</button>
                </form>
                <a href="product_detail.php?id=<?php echo $each['p_id']?>" class="button">mua lại</a>
            <?php endforeach?>
        </div>
        </main>

        <div class="c-author">
        Cảm ơn bạn vì đã ghé thăm 💛 &nbsp;
        </div>

    </div>
    <?php } else {?>
        Chưa có đơn hàng
    <?php }?>
    </div>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../index.js"></script>
    <script src="../notify.js"></script>
</body>
</html>