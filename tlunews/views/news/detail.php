<!-- kết nối cơ sở dữ liệu -->
<?php 
    include ($_SERVER['DOCUMENT_ROOT'].'/tintuc/tlunews/config/database.php');
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <?php 
        if (isset($_GET['ID'])) {
            $stmt = $conn->prepare("SELECT * FROM news");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            foreach($kq as $kq) {
                if ($kq['id'] == $_GET['ID']) {
                    echo '<h1>'.$kq['title'].'</h1>';
                    echo '<p?>'.$kq['content'].'</p>';
                }
            }
        }
    ?>
 </body>
 </html>