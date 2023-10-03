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
        #form{
            padding-left: 200px ;
            padding-top: 40px ;
            width: 100%;
            height:100%;  
        }
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
        <?php include '../content.php';?>
        <div id="content-right">
            <div id="form">
            <?php
            $id = $_GET['id'];
            require '../../connect.php';
            $sql = "select * from products
            where id ='$id' ";
            $result = mysqli_query($connect,$sql);

            $sql = "select * from manufacturer";
            $manufacturer = mysqli_query($connect,$sql);

            $number_rows = mysqli_num_rows($result);
            if($number_rows == 1){
                $new = mysqli_fetch_array($result);
            ?>
            <form action="process_update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $new['id'] ?>">
                name<br>
                <input type="text" name="name" value="<?php echo $new['name'] ?>"><br>
                change photo<br>
                <input type="file" name="photo_new"><br>
                old photo<br>
                <img src="photos/<?php echo $new['photo']?>"><br>
                <input type="hidden" name="photo_old" value="<?php echo $new['photo'] ?>">
                price<br> 
                <input type="text" name="price" value="<?php echo $new['price'] ?>"><br>
                description<br>
                <textarea name="description" id="" cols="30" rows="10" >
                    <?php echo $new['description'] ?>
                </textarea><br>
                manufacturer<br>
                <select name="manufacturer_id" id=""><br>
                    <?php foreach($manufacturer as $each):?>
                        <option value="<?php echo $each['id'] ?>"
                        <?php if($new['manufacturer_id'] == $each['id']){ ?>
                            selected
                        <?php } ?>
                        >
                            <?php echo $each['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <br><br>
                <button class="button">update</button>
            </form>
            <?php } ?>
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