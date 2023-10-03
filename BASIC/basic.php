<?php
$a = 5;
if($a < 10){
    // echo "số $a nhỏ hơn 10" . ' hiểu chưa'; cách 1
    echo 'số ' . $a . ' nhỏ hơn 10'; // cách 2
    // dấu "" sẽ cho ghi biến trong echo , và dấu . là nối chuỗi
} else {
    echo 'biến a lớn hoặc bằng 10';
}

for($i = 1 ; $i <= 100; $i ++){
    echo $i . "<br>"; 
}
// echo $a;
