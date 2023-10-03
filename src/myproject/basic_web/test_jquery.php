<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
    type somthing 
    <input type="text" name="text" id="text">
    </form>
    <div id="result"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        // $("#text").val('lam'); 
        // gán gía trị cho id
        $("#text").change(function(){ // hàm thay đổi sự kiện có thể ghi event vào hoặc không
            // keyup là ấn enter sẽ ra kq , còn keydown là type là hiện kết quả luôn
            let name = $(this).val(); // this là thằng cha trong function
            $("#result").text('bạn đã điền:' + name);// chuyền dữ liẹu 
        });
    });
    // đoạn code trên là để chạy hết tài liệu html xong mới chạy js
    </script>
</body>
</html>