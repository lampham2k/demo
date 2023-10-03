<?php
require '../product/check_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../index.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <style type="text/css">
        #page{
            width: 100%;
            height:1200px;
        }
        #header{
            width: 100%;
            height:20%;
        }
        #content{
            background:#E3E3E3;
            width: 100%;
            height:80%;
        }
        #content-left{
            float:left;
            width: 15%;
            height:100%;
        }
        #content-right{
            float:left;
            width: 85%;
            height:100%;
        }

        /* update table */
        th, td {
        border-bottom: 1px solid #ddd;
        padding: 15px;
        text-align: left;
        }        
        /* update img */
        img { 
        display: block;
        max-height:80px;
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
        font-size: 10px;
        }            
    </style>
</head>
<body>
    <div id ="page">
        <?php include '../header.php';
                include '../../connect.php';
                $id = $_GET['id'];
                $sql ="select products.* , order_product.* , manufacturer.name as 'manufacturer name' , types.name as 'type'
                from order_product
                join products on order_product.product_id = products.id
                join product_type on products.id = product_type.product_id
                join types on product_type.type_id = types.id
                join manufacturer on products.manufacturer_id = manufacturer.id
                where order_product.order_id = '$id' ";
                $result = mysqli_query($connect,$sql); 
        ?>
        <div id="content">
            <?php 
                include '../content.php';        
            ?>
            <div id="content-right">
                <div id="table">
                    <a href="index.php" class="button">
                        back
                    </a>
                    <br><br>
                    <table width="100%">
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>photo</th>
                            <th>price</th>
                            <th>manufacturer name</th>
                            <th>description</th>
                            <th>type</th>
                            <th>quantity</th>
                        </tr>
                        <?php foreach ($result as $each_result ){ ?>
                            <tr>
                                <td>
                                    <?php echo $each_result['id'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['name'] ?>
                                </td>
                                <td>
                                    <img src="../product/photos/<?php echo $each_result['photo'] ?>">
                                </td>                                
                                <td>
                                    <?php echo $each_result['price'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['manufacturer name'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['description'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['type'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['quantity'] ?>
                                </td>                                    
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script src="../../index.js"></script>
</body>
</html>
