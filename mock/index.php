<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON File List</title>
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
            width: 60%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #28a745;
            color: white;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        #responseContainer {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background: #fff;
            text-align: left;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>JSON File List</h2>
        <table>
            <tr>
                <th>Filename</th>
                <th>Action</th>
            </tr>
            <?php
            $uploadDir = "uploads/";
            if (is_dir($uploadDir)) {
                $files = glob($uploadDir . "*.json");
                foreach ($files as $file) {
                    $fileName = basename($file);
                     $fileWTE=pathinfo($fileName, PATHINFO_FILENAME);
                    echo "<tr><td>$fileName</td><td><a href='api.php?file=$fileWTE'>View</a></td></tr>";
                }
            }
            ?>
        </table>
        <div id="responseContainer">Create a Json File for response.  <a href='upload.php'>Click here to create</a></div>
    </div>

    <script>
        function fetchJson(fileName) {
            fetch(`api.php?file=${fileName.replace('.json', '')}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('responseContainer').innerText = JSON.stringify(data, null, 4);
                })
                .catch(error => {
                    document.getElementById('responseContainer').innerText = "Error loading file.";
                });
        }
    </script>
</body>
</html>
