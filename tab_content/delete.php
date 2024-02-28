<!DOCTYPE html>
<?php
    if(!isset($_COOKIE["user"])){
        header("Location: index.php");
        exit();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Page</title>
    <link rel="icon" type="image/x-icon" href="icon.ico" />
       <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        fieldset {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 30px;
            width: 90%;
            max-width: 400px; /* 设置最大宽度 */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto; /* 上下居中，左右自动边距 */
        }

        legend {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>删除队伍信息</legend>
        <body>
    <fieldset>
        <legend></legend>
            <form method="POST" action="delete_submit.php" enctype="multipart/form-data">
                <label for="serial_number">要删除的记录编号:</label>
                <input type="int" name="serial_number" required>
                <br>
                <input type="submit" name="upload" value="upload">
            </form>
    </fieldset>
</body>
</html>
    </fieldset>
</body>
</html>