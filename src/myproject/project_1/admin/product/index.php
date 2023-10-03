<?php
require 'check_admin.php';
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
        #table{
            padding-left: 80px ;
            padding-top: 40px ;
            width: 90%;
            height:100%;  
        }
        tr:nth-child(even) {
            background-color: #D6EEEE;
        }
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 10px;
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
        font-size: 16px;
        }            
    </style>
</head>
<body>
    <div id ="page">
        <?php include '../header.php'; ?>
        <div id="content">
            <?php 
                include '../content.php';
                require '../../connect.php';
                $sql ="select products.* , manufacturer.id as id_manufacturer  , manufacturer.name as name_manufacturer
                from products
                join manufacturer on products.manufacturer_id = manufacturer.id ";
                $result = mysqli_query($connect,$sql);         
            ?>
            <div id="content-right">
                <div id="table">
                    <a href="form_insert.php" class="button">
                        add products
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
                            <th>manufacturer id</th>
                            <th>update</th>
                            <th>remove</th>
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
                                    <img src="photos/<?php echo $each_result['photo'] ?>">
                                </td>                                
                                <td>
                                    <?php echo $each_result['price'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['name_manufacturer'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['description'] ?>
                                </td>
                                <td>
                                    <?php echo $each_result['id_manufacturer'] ?>
                                </td>                                
                                <td>
                                    <a class="button" href="form_update.php?id=<?php echo $each_result['id'] ?>">
                                        updates
                                    </a>
                                </td>
                                <td>
                                    <a class="button" href="delete.php?id=<?php echo $each_result['id'] ?>">
                                        delete
                                    </a>
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