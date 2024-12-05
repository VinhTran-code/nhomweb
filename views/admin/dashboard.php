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
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NEWS Dashboard</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">Home</a></li>
    </ul>
    
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<!-- <div class="container">
  <h2>Welcome to the Dashboard, <?php echo $_SESSION['username']; ?>!</h2>
  <p>This is your dashboard, where you can manage your account and view news.</p>
  
</div> -->

</body>
</html>
