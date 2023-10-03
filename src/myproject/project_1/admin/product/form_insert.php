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
    <link rel="stylesheet" href="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/themes/github.css">    
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
        <?php include '../content.php';
        require '../../connect.php';
        $sql ="select * from manufacturer";
        $result = mysqli_query($connect,$sql);
        ?>
        <div id="content-right">
            <div id="form">
            <form action="process_insert.php" method="post" enctype="multipart/form-data"> 
            name
            <input type="text" name="name">
            <br>
            image
            <br>
            <input type="file" name="photo">
            <br>
            price
            <br>
            <input type="number" name="price">
            <br>
            description
            <br>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <br>
            manufacturer_id
            <select name="manufacturer_id" >
                <?php foreach ($result as $each): ?>
                    <option value="<?php echo $each['id'] ?>">
                        <?php echo $each['name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <br>
            types
            <br>
            <input type="text" name="type_names" id="type">
            <br><br><br><br>      
            <button class="button">add product</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script src="../../index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
    <script type="text/javascript" src="typeahead.bundle.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("form").keypress(function(event) {
                if(event.keyCode === 13){
                    event.preventDefault();
                }
            });
            var types = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: 'list_type.php?q=%QUERY',
                    wildcard: '%QUERY'
                }
                });

                $('#type').tagsinput({
                typeaheadjs: {
                    displayKey: 'name',
                    valueKey: 'name',
                    source: types
                    },
                    freeInput : true
                });
        });
    </script>
</body>
</html>