<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        #tong{
            background:black;
            width: 100%;
            height:800px;
        }
        #tren{
            background:yellow;
            width: 100%;
            height:20%;
        }
        #giua{
            background:blue;
            width: 100%;
            height:60%;
        }
        #duoi{
            background:purple;
            width: 100%;
            height:20%;
        }
    </style>
</head>
<body>
    <div id="tong">
        <?php include 'menu.php'; ?>
        <?php include 'product_detail.php'; ?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>