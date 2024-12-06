<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức Mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #fafafa;
        }

        textarea {
            resize: vertical;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #5e9fff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #4CAF50;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm Tin Tức Mới</h1>

        <form method="post" action="index.php?controller=news&action=add" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" id="title" name="title" required placeholder="Nhập tiêu đề tin tức">
            </div>
            
            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea id="content" name="content" rows="5" required placeholder="Nhập nội dung tin tức"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Ảnh:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="created_at">Thời gian:</label>
                <input type="text" id="created_at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
            </div>

            <button type="submit">Thêm Tin Tức</button>
            <a href="index.php?controller=news&action=index">Quay lại danh sách</a>
        </form>
    </div>
</body>
</html>
