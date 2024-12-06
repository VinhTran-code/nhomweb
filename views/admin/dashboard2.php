<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang login
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .btn-account {
  background-color: #007bff; /* Màu xanh dương tương tự hình ảnh */
  color: #fff; /* Màu chữ trắng */
  border: none;
  border-radius: 5px;
  padding: 15px 30px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-account:hover {
  background-color: #0062cc; /* Màu xanh dương đậm hơn khi hover */
}
.btn-news {
  background-color: #007bff; /* Màu xanh dương tương tự hình ảnh */
  color: #fff; /* Màu chữ trắng */
  border: none;
  border-radius: 5px;
  padding: 15px 30px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-news:hover {
  background-color: #0062cc; /* Màu xanh dương đậm hơn khi hover */
}

  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NEWS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-center">
      <li><a href="#">ADMIN</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
    </ul>
  </div>
</nav>
</body>
</html>