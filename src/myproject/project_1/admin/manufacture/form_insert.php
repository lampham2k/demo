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
            <form action="process_insert.php" method="post" enctype="multipart/form-data"> 
                name
                <br>
                <input type="text" name="name">
                <br>
                address
                <br>
                <textarea name="address" id="" cols="30" rows="10"></textarea>
                <br>
                phone
                <br>
                <input type="text" name="phone">
                <br>
                image
                <br>
                <input type="file" name="image">
                <br><br>
                <button>add manufacturer</button>
            </form>
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