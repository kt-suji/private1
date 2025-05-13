<?php
// ファイルがアップロードされた場合の処理
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
    $uploadDir = 'files/upload/'; // 保存先ディレクトリ
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // ディレクトリがない場合は作成
    }

    $files = $_FILES['files'];
    $totalFiles = count($files['name']);
    $uploadedFiles = [];
    $errors = [];

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = basename($files['name'][$i]);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($files['tmp_name'][$i], $targetFile)) {
            $uploadedFiles[] = $fileName;
        } else {
            $errors[] = $fileName;
        }
    }

    if (!empty($uploadedFiles)) {
        $message .= "以下のファイルがアップロードされました:<br>" . implode('<br>', $uploadedFiles);
    }

    if (!empty($errors)) {
        $message .= "<br>以下のファイルのアップロードに失敗しました:<br>" . implode('<br>', $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイルアップロードページ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #333;
        }
        .file-input {
            display: block;
            margin: 20px auto;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ファイルアップロードページ</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="files[]" class="file-input" multiple required>
            <button type="submit">アップロード</button>
        </form>
        <?php if (!empty($message)): ?>
            <div class="message"><?= $message ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
