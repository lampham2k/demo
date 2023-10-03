<?php
require 'admin/connect.php';
$max_date = $_GET['days'];
// DATE_FORMAT là setup ngày tháng theo ý mình mong muốn.(ở đây là ngày và tháng)
// condition : 7 days ago
$sql ="select DATE_FORMAT(created_at,'%e-%m') as 'day' , 
sum(total_price) as 'revenue' 
from orders 
WHERE DATE(created_at) >= CURDATE() - INTERVAL $max_date DAY and  DATE(created_at) < CURDATE()
group by DATE_FORMAT(created_at,'%e-%m')";
$result = mysqli_query($connect,$sql);
   // đây là mảng 1 chiều.
   // $arrDay = [];
   // $arrRevenue = [];
// foreach($result as $each){
   // đây là cách đổ dữ liệu vào mảng 1 chiều.
   // $arrDay[] = $each['day'];
   // $arrRevenue[] = $each['revenue'];
// }

// 19-6-2022
$arr = [];
$this_month = date('m');
$today = date('day');
if($today < $max_date){  
   $day_last_month = $max_date - $today;   // số ngày muốn lấy của tháng trước.
   $last_month = date("m",strtotime("-1 month"));  // hàm này lấy ra tháng trước của hiện tại.
   $last_day_of_previous_month = date('d', strtotime('last day of previous month'));   // hàm này là lấy ngày cuối cùng của tháng trước.
   $start_day_last_month = $last_day_of_previous_month - $day_last_month + 1 ;

   // mảng 2 chiều.
   // tạo 1 mảng và in bỏ vào tất cả key có giá trị là 0 , sau đó mới nhập values vào key nào có value.
   for($i = $start_day_last_month; $i <= $last_day_of_previous_month ; $i++){
       $key = $i . '-' . $last_month;
       $arr[$key] = 0;
   }
   $start_day_this_month = 1;
} else {
   $start_day_this_month = $today - $max_date;
}
// $max_date = date("t");  // hàm này là lấy số ngày trong tháng.

for($i = $start_day_this_month; $i <= $today ; $i++){
   $key = $i . '-' . $this_month;
   $arr[$key] = 0;
}
foreach($result as $each){
   // đổ dữ liệu vào mảng 2 chiều , key và value.
   // float để ép kiểu string thành số.
   $arr[$each['day']] = (float)$each['revenue']; // $each['day'] là key , còn $each['revenue'] là value.
}
// in ra mảng để ktra. 
echo json_encode($arr);
// exit();
