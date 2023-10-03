<?php
session_start();
// session_destroy();
// session_destroy hàm này sẽ đăng xuất và văng hết tất cả mọi thứ ra.
unset($_SESSION['id']);
unset($_SESSION['name']);

setcookie('remember' ,null,-1);
// xóa cookie khi người dùng đăng xuất.

// unset là xóa trên sever còn cookie lưu trên client cho nên k lấy unset xóa được .

header('location:index.php?success=successfully logged out');