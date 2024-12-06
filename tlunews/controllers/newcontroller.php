<?php
require_once './models/news.php';

class NewsController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new NewsModel();
    }

   // Controller
    public function index() {
        $news = $this->newsModel->getAllNews();
        require './views/admin/news/index.php'; // truyền $news vào view
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category_id'])) {
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $category_id = (int)$_POST['category_id'];
                $image = null;
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = './uploads/';
                    $image = basename($_FILES['image']['name']);
                    $uploadFile = $uploadDir . $image;
    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $image = $image; // Lưu tên ảnh nếu upload thành công
                    } else {
                        echo "Không thể tải lên file ảnh.";
                        $image = null;
                    }
                }
                
                if (!empty($title) && !empty($content) && $category_id > 0) {
                    $created_at = date('Y-m-d H:i:s');
                    $this->newsModel->addNews($title, $content, $image, $created_at, $category_id);
                    header('Location: index.php?controller=news&action=index');
                    exit;
                } else {
                    echo "Tiêu đề, nội dung hoặc danh mục không hợp lệ.";
                }
            }
        }
        require './views/admin/news/add.php';
    }
        
      
    public function edit($id) {
        if (!$id) {
            echo "Invalid ID.";
            return;
        }
        $news = $this->newsModel->getNewsById($id);
        if (!$news) {
            echo "News not found.";
            return;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Form processing logic
            if (isset($_POST['title'], $_POST['content'], $_POST['category_id'])) {
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);
                $category_id = (int)$_POST['category_id'];
                $image = $news['image']; // Retain current image if no new one uploaded
    
                // Handle image upload if a new one is provided
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = './uploads/';
                    $newImage = basename($_FILES['image']['name']);
                    $uploadFile = $uploadDir . $newImage;
    
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                        $image = $newImage; // Update image if upload is successful
                    } else {
                        echo "Cannot upload new image.";
                    }
                }
    
                // Check if data is valid before updating
                if (!empty($title) && !empty($content) && $category_id > 0) {
                    $created_at = date('Y-m-d H:i:s');
                    $this->newsModel->updateNews($id, $title, $content, $image, $created_at, $category_id);
                    header('Location: index.php?controller=news&action=index');
                    exit;
                } else {
                    echo "Invalid title, content, or category.";
                }
            }
        }
        require './views/admin/news/edit.php';
    }
    
    public function delete() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $news = $this->newsModel->getNewsById($id);
            if ($news) {
                $this->newsModel->deleteNews($id);
                if (!empty($news['image'])) {
                    $filePath = './uploads/' . $news['image'];
                    if (file_exists($filePath)) {
                        unlink($filePath); // Delete the associated image file
                    }
                }
                header('Location: index.php?controller=news&action=index');
                exit;
            } else {
                die('News does not exist!');
            }
        } else {
            die('Invalid ID!');
        }
    }
    
    
}
