<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload JSON File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input[type="file"] {
            margin: 10px 0;
        }
        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload JSON File</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="jsonFile" accept=".json" required>
            <br>
            <button type="submit">Upload</button>
        </form>
        <div>List of Json Files. <a href='index.php'>View</a></div>
        <div id="response"></div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['jsonFile'])) {
        header("Content-Type: application/json");
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileTmpPath = $_FILES['jsonFile']['tmp_name'];
        $fileName = basename($_FILES['jsonFile']['name']);
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        
        if ($fileExt !== "json") {
            echo "<script>document.getElementById('response').innerHTML = 'Only JSON files are allowed';</script>";
            exit;
        }
        
        $destination = $uploadDir . $fileName;
        
        if (move_uploaded_file($fileTmpPath, $destination)) {
            echo "<script>document.getElementById('response').innerHTML = 'File uploaded successfully: $fileName';</script>";
        } else {
            echo "<script>document.getElementById('response').innerHTML = 'Failed to upload file';</script>";
        }
    }
    ?>
</body>
</html>
