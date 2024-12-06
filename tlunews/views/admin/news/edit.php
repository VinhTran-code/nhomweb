<?php
require_once './models/news.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID tin tức không hợp lệ.');
}

$id = $_GET['id'];

// Lấy tin tức hiện tại từ cơ sở dữ liệu
$newsModel = new NewsModel();
$news = $newsModel->getNewsById($id);

if (!$news) {
    die('Tin tức không tồn tại.');
}

// Xử lý khi người dùng gửi form chỉnh sửa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $category_id = (int)$_POST['category_id'];
    $image = $news['image']; // Giữ nguyên ảnh hiện tại nếu không thay đổi
    
    // Nếu người dùng tải lên ảnh mới
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = './uploads/';
        $newImage = basename($_FILES['image']['name']);
        $uploadFile = $uploadDir . $newImage;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $image = $newImage; // Nếu upload thành công, thay thế ảnh
        } else {
            echo "Không thể tải lên ảnh mới.";
        }
    }

    if (!empty($title) && !empty($content) && $category_id > 0) {
        $created_at = date('Y-m-d H:i:s');
        $newsModel->updateNews($id, $title, $content, $image, $created_at, $category_id);
        header('Location: index.php?controller=news&action=index');
        exit;
    } else {
        echo "Tiêu đề, nội dung hoặc danh mục không hợp lệ.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Tin Tức</title>
    <style>
        /* Giữ nguyên CSS của trang thêm tin tức */
    </style>
</head>
<body>
    <div class="container">
        <h1>Chỉnh sửa Tin Tức</h1>

        <form method="post" action="edit.php?id=<?php echo $news['id']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required placeholder="Nhập tiêu đề tin tức">
            </div>
            
            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea id="content" name="content" rows="5" required placeholder="Nhập nội dung tin tức"><?php echo htmlspecialchars($news['content']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="image">Ảnh hiện tại:</label>
                <img src="./uploads/<?php echo $news['image']; ?>" alt="Image" style="max-width: 200px; margin-bottom: 10px;">
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="created_at">Thời gian:</label>
                <input type="text" id="created_at" name="created_at" value="<?php echo $news['created_at']; ?>" readonly>
            </div>

            <button type="submit">Lưu thay đổi</button>
            <a href="index.php?controller=news&action=index">Quay lại danh sách</a>
        </form>
    </div>
</body>
</html>
