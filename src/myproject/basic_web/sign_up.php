<?php
    // session_start();            update : tạm xóa session tại vì chèn vô index có session rồi
    // if(isset($_SESSION['error'])){       update : có thể xóa dòng này.
    //     echo $_SESSION['error'];
    //     unset($_SESSION['error']);
    // }
?>
<!-- <!DOCTYPE html>                update xóa html , vì bản chất bây giờ file này là một cái div
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
<div id="modal-sign-up" class="modal fade"> 
    <!-- chèn thêm class để ẩn , khi nào gọi mới hiện -->
    <div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <h1>FORM SIGN UP</h1>
        <div class="alert alert-danger" id="div-error" style="display: none;">
            <!-- <strong>Success!</strong> Indicates a successful or positive action. -->
        </div>
    </div>
        <div class="modal-body">
        <form action="process_signup.php" id="form-sign-up" method="post">
            <h1>SIGN UP</h1><br>
            name
            <input type="text" name="name"><br>
            email
            <input type="email" name="email"><br>
            password
            <input type="password" name="password"><br>
            phone_number
            <input type="number" name="phone_number"><br>
            address
            <input type="text" name="address"><br>
            <button>SIGN UP</button>
        </form>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(event){
        $("#form-sign-up").validate({       // chuyền id vào hàm validate
		// onfocusout: false,               // k quan trọng có thể bỏ.
		// onkeyup: false,
		// onclick: false,
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
				// minlength: "Hãy nhập ít nhất 8 ký tự"
			},
			"password": {
				equalTo: "Hai password phải giống nhau",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			}
		},
        submitHandler: function() {
            $.ajax({
                url: 'process_signup_v1.php',
                type: 'POST',
                dataType: 'html',
                data: $("#form-sign-up").serializeArray(), // biến this cụ thể trường hợp này là form thành mảng.
            })
            .done(function(response){
                if(response !== '1'){ // có thể số 1 trả về là chuỗi cho nên phải thêm '' 
                    $("#div-error").text(response); // nếu chạy xong response k trả về 1 thì chuyền vào div error 1 đoạn text response
                    $("#div-error").show(response); // hàm show để hiển thị ra 
                } else {
                    $("#modal-sign-up").toggle();   // hàm này giống công tắt bật , khi bật thì tắt và ngược lại.
                    $(".modal-backdrop").hide();    // 
                    $(".menu-guest").hide();       // hiện ra cái menu 
                    $(".menu-user").show();       // hiện ra cái menu 
                    $("#span-name").text($("input[name='name']").val());         // chuyền vào tên đã nhập ở form bên trên vào thẻ có id dc chọn 
                }
            });
        }
	});
        // $("#form-sign-up").submit(function(event){ // khi mà cái form này dc submit
        //     event.preventDefault(); // thì sẽ k hoạt động như bth
            
        // });

        // update: sửa tính năng thành jquery validate 
    });
</script>
    
<!-- </body>
</html> -->