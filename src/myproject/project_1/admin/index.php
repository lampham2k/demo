<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Karla);
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:300);

        .wrap{
        padding:120px 0;
        font-size:62px;
        color:#888;
        width:400px;
        font-family:'Karla';
        margin:0 auto;
        text-align:center;
        }

        input{
        font-family:'Ubuntu';
        font-weight:300;
        border:0;
        border-bottom:1px solid #ff5407;
        width:100%;
        height:36px;
        font-size:26px;
        }

        input:focus{
        outline:none;
        box-shadow:none;
        background:#ffeae2;
        }

        button{
        border:0;
        background:transparent;
        padding:5px;
        margin-top:50px;
        position:relative;
        outline:0;
        }

        .buttonafter:after{
        content:'';
        display:block;
        position:absolute;
        top:8px;
        left:100%; /*should be set to 100% */
        width:0;
        height:0;
        border-color: transparent transparent transparent #14a03d; /*border color should be same as div div background color*/
        border-style: solid;
        border-width: 5px;

        }

        .forgot{
        background:#a0a0a0;
        color:#fff;
        float:left;
        }

        .login{
        background:#a0a0a0;
        color:#fff;
        float:right;
        }

        .login.buttonafter {
            background:#14a03d;
        } 
    </style>
</head>
<body>
<div class='wrap'>
  Login
    <form action="process_login.php" method="post">
        <input type='text' name='email' placeholder='Email'>
        <input type='password' name='password' placeholder='Password'>
        <button class='forgot'>FORGOT PASSWORD ?</button> 
        <button class='login'>LOG IN</button>
    </form>
</div>
</body>
</html>