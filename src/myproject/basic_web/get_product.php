<?php
require 'admin/connect.php';
$max_date = $_GET['days'];
// DATE_FORMAT là setup ngày tháng theo ý mình mong muốn.(ở đây là ngày và tháng)
// condition : 7 days ago
$sql ="select products.name as 'ten_san_pham',
products.id as 'id_san_pham',
DATE_FORMAT(created_at,'%e-%m') as 'day' , 
sum(quantity) as 'so_san_pham_ban_dc' 
from bao_tri.orders 
join bao_tri.order_product on orders.id = order_product.order_id
join bao_tri.products on products.id = order_product.product_id
WHERE DATE(created_at) >= CURDATE() - INTERVAL $max_date DAY and  DATE(created_at) < CURDATE()
group by products.id , DATE_FORMAT(created_at,'%e-%m')";
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
 
   $start_day_this_month = 1;
} else {
   $start_day_this_month = $today - $max_date;
}
// set tên mảng theo id sản phẩm
// 1": {
// "name": "apple",
// "y": 2,
// "drilldown": "apple"
// },
// trong mảng này có 3 object , trường hợp này là attribute k phải key và values.
foreach($result as $each){
   $id_san_pham = $each['id_san_pham'];
   if(empty($arr[$id_san_pham])){
      $arr[$id_san_pham] = [
         'name' => $each['ten_san_pham'],
         'y' => (int)$each['so_san_pham_ban_dc'],
         'drilldown' => (int)$each['id_san_pham'],
      ];
   } else {
      $arr[$id_san_pham]['y'] += $each['so_san_pham_ban_dc'];
   }
}
$arr2 = [];
foreach($arr as $id_san_pham => $each){
   $arr2[$id_san_pham] =[     // key là $id_san_pham
      'name' => $each['name'], // $each['name'] lấy từ arr bên trên
      'id' => $id_san_pham,
   ];
   $arr2[$id_san_pham]['data'] = [];
   if($today < $max_date){
      for($i = $start_day_last_month; $i <= $last_day_of_previous_month ; $i++){
         $key = $i . '-' . $last_month;
         $arr2[$id_san_pham]['data'][$key] = [
            $key,
            0
         ];
     }
   }
}
foreach($result as $each){
   $id_san_pham = $each['id_san_pham'];
   $key = $each['day'];
   $arr2[$id_san_pham]['data'][$key] = [
      $key,
      (int)$each['so_san_pham_ban_dc']
   ];
}
// mảng sẽ in ra kiểu này.
// "1": {
//    "name": "apple",
//    "id": 1,
//    "data": {
//      "22-05": [
//        "22-05",
//        0
//      ],

// 1 cái mảng to ôm 2 mảng con.
$object = json_encode([$arr,$arr2]);
echo $object;
// exit();
