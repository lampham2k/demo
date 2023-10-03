<?php
require '../../connect.php';
$max_date = $_GET['days'];
$sql ="select products.name as 'ten_san_pham',
products.id as 'id_san_pham',
DATE_FORMAT(created_at,'%e-%m') as 'day' , 
sum(quantity) as 'so_san_pham_ban_dc' 
from project_1_J2school.orders 
join project_1_J2school.order_product on orders.id = order_product.order_id
join project_1_J2school.products on products.id = order_product.product_id
WHERE DATE(created_at) >= CURDATE() - INTERVAL $max_date DAY and DATE(created_at) <= CURDATE()
group by products.id , DATE_FORMAT(created_at,'%e-%m')";
$result = mysqli_query($connect,$sql);

$arr = [];
$this_month = date('m');
$today = date('d');
if($today < $max_date){  
   $day_last_month = $max_date - $today;  
   $last_month = date("m",strtotime("-1 month"));  
   $last_day_of_previous_month = date('d', strtotime('last day of previous month'));    
   $start_day_last_month = $last_day_of_previous_month - $day_last_month + 1;
   $start_day_this_month = 1;
} else {
   $start_day_this_month = $today - $max_date + 1;
}

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
   $arr2[$id_san_pham] =[     
      'name' => $each['name'],
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
     for($i = $start_day_this_month; $i <= $today ; $i++){
        $key = $i . '-' . $this_month;
        $arr2[$id_san_pham]['data'][$key] = [
           $key,
           0
        ];
     }
   } else {
      for($i = $start_day_this_month; $i <= $today ; $i++){
         $key = $i . '-' . $this_month;
         $arr2[$id_san_pham]['data'][$key] = [
            $key,
            0
         ];
      }
   };
}
foreach($result as $each){
   $id_san_pham = $each['id_san_pham'];
   $key = $each['day'];
   $arr2[$id_san_pham]['data'][$key] = [
      $key,
      (int)$each['so_san_pham_ban_dc']
   ];
}

$object = json_encode([$arr,$arr2]);
echo $object;

