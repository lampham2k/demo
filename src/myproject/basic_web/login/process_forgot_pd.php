<?php
function current_url()
{
    $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // $validURL = str_replace("&", "&amp;", $url);
    return $url;
}
// đây là hàm lấy link của web local kiểu vậy.
$email = $_POST['email'];

require '../admin/connect.php';

$sql = " select id from customers where email = '$email' ";
// từ email của khách hàng phải kiểm tra xem email này là khách hàng nào.
$result = mysqli_query($connect , $sql);
if(mysqli_num_rows($result) === 1){ // kiểm tra tiếp email này đã dk chưa.
    $each = mysqli_fetch_array($result);
    $id = $each['id']; // nếu có trong db thì sẽ lấy ra id và name
    $name = $each['name'];
    $sql ="delete from forgot_password where customer_id = '$id'"; // xóa token của kh nếu đã tồn tại
    $result = mysqli_query($connect , $sql);
    $token = uniqid(); // la mot ham sinh ra mot sting random
    $created_at = date('y-m-d');
    $sql ="insert into from forgot_password(id,token,created_at)
    values('$id','$token','$created_at')";
    mysqli_query($connect , $sql);
    // sau khi tìm dc id khách hàng thì sẽ thêm vào bảng khách hàng quên mật khẩu.

    $link = current_url() . '/change_new_password.php?token='.$token;
    // đây là link thay đổi mật khẩu , chuyền vào token để nhận biết ai muốn thay đổi
    require 'mail.php'; 
    // sau đó gửi mail kèm link cho khách . 
    $title = 'change your password';
    $content = "click the link to change password <a href='$link'>change</a>" ;
    sendmail($email,$name,$title,$content)
    // chuyền vào function những giá trị để sendmail cho kh thay đổi mk 
}
