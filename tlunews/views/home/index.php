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
        table, th, td {
            border: 1px solid;

        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            text-align: left;
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
        
        <form class="navbar-form navbar-left" action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
            </div>
            <button type="submit" class="btn btn-default" name="btn-search">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
        </ul>
    </div>
    </nav>

    <h1 style="text-align: center">DANH SÁCH TIN TỨC</h1>
    
    <?php 
        include ($_SERVER['DOCUMENT_ROOT'].'/tintuc/tlunews/config/database.php');
        
    ?>

    <?php 
        if (isset($_POST['btn-search'])) {
            $tieude = $_POST['search'];
        } else {
            $tieude = '';
        }
    ?>
    <?php 
        $stmt = $conn->prepare("SELECT * FROM news WHERE title LIKE '%$tieude%'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
    ?>
    <?php
            foreach ($kq as $kq) {
            $image = $_SERVER['DOCUMENT_ROOT'].'/tintuc/tlunews/img/'.$kq['image'];
            $id = $kq['id'];
        ?>
                <h1><?php echo $kq['title']; ?></h1>
                <img src='<?php echo $image; ?>' alt="">
                <br>
                <a href="http://localhost/tintuc/tlunews/views/news/detail.php?ID=<?php echo $id; ?>">Xem chi tiết</a>
        <?php } ?>
</body>
</html>