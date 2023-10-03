<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        float:left;
        }

        .login.buttonafter {
            background:#14a03d;
        } 
    </style>
</head>
<body>
<div class='wrap'>
  SIGN UP
    <form action="process_signup.php" method="post" id="form-sign-up">
        <input type='text' name='name' placeholder='name'>
        <input type='text' name='email' placeholder='Email'>
        <input type='password' name='password' placeholder='Password'>
        <input type='number' name='phone' placeholder='Phone number'>
        <input type='text' name='address' placeholder='address'>
        <button class='login'>SIGN UP</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>                   <!-- chèn thư viện jquery vào -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>            
<script src="https://jqueryvalidation.org/files/lib/jquery.form.js"></script>  
<script type="text/javascript">
    $(document).ready(function(event){
        $("#form-sign-up").validate({
		rules: {
			"name": {
				required: true,
				maxlength: 15
			},
            "email": {
				required: true,
                email: true
			},
			"password": {
				required: true,
				minlength: 8
			}
		},
        messages: {
			"name": {
				required: "Bắt buộc nhập username",
				maxlength: "Hãy nhập tối đa 15 ký tự"
			},
			"email": {
				required: "Bắt buộc nhập email",
			},
			"password": {
				required: "Bắt buộc nhập password",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			}
		},
	});
    });
</script>
</body>
</html>