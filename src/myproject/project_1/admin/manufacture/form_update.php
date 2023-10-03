<?php
    require 'check_super_admin.php';
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
            /* background:blue; */
            width: 100%;
            height:20%;
        }
        #content{
            background:#E3E3E3;
            width: 100%;
            height:80%;
        }
        #content-left{
            /* background:blue; */
            float:left;
            width: 15%;
            height:100%;
        }
        #content-right{
            /* background:black; */
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
                $sql = "select * from manufacturer
                where id = '$id'";
                $result = mysqli_query($connect , $sql);
                $number_rows = mysqli_num_rows($result);
                if($number_rows == 1){
                $new = mysqli_fetch_array($result);
            ?>
                <form method="post" action="process_update.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $new['id'] ?>">
                <!-- ẩn đi input -->
                name
                <input type="text" name="name" value="<?php echo $new['name'] ?>">
                <br>
                address
                <br>
                <textarea name="address" id="" cols="30" rows="10" >
                    <?php echo $new['address'] ?>
                </textarea>
                <br>
                phone
                <input type="text" name="phone" value="<?php echo $new['phone_number'] ?>">
                <br>
                change photo
                <input type="file" name="photo_new">
                <br>
                old picture
                <img src="photos/<?php echo $new['photos'] ?>">
                <input type="hidden" name="photo_old" value="<?php echo $new['photos'] ?>">
                <br>
                <button>update</button>
                </form>
            <?php } else{ ?>
                    <h1> not found under this code </h1>
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