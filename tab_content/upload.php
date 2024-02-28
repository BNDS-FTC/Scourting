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
    <link rel="stylesheet" href="/scouting/css/upload.css">
</head>
<body>
    <fieldset>
        <legend>队伍得分上传</legend>
        <body>
    <fieldset>
        <legend>队伍得分上传</legend>
            <form method="POST" action="upload_submit.php" enctype="multipart/form-data">
                <label for="id">队伍编号:</label>
                <input type="int" name="id" required>
                <br>
                <label for="name">队伍名称:</label>
                <input type="text" name="name" required value="忘了">
                <br>
                <label for="sca">队伍自动阶段得分:</label>
                <input type="int" name="sca" required>
                <br>
                <label for="sch">队伍手动阶段得分:</label>
                <input type="int" name="sch" required>
                <br>
                <label for="sctot">队伍总分:</label>
                <input type="int" name="sctot" required>
                <br>
                <label for="file">图片：</label>
                <input type="file" name="file" id="file">
                <br>
                <label for="plane">队伍纸飞机得分:</label>
                <input type="int" name="plane" value=0>
                <br>
                <label for="hang">队伍能否悬挂</label>
                <input type="int" name="hang" value=0>
                <br>
                <label for="which_intake">使用哪种Intake:</label>
                <select name="which_intake">
                    <option value="无">无</option>
                    <option value="卷吸">卷吸</option>
                    <option value="爪子">爪子</option>
                </select>
                <br>
                <label for="intake_design">队伍intake评价:</label>
                <input type="text" name="intake_design" value="无">
                <br>
                <label for="which_auto">实现哪种自动:</label>
                <select name="which_design">
                    <option value="无">无(一动不动/没拿分)</option>
                    <option value="近端">近端</option>
                    <option value="远端">远端</option>
                </select>
                <br>
                <label for="auto_design">队伍自动阶段设计:</label>
                <input type="text" name="auto_design" value="无">
                <br>
                <label for="penalty">队伍penalty失分:</label>
                <input type="text" name="penalty" value=0>
                <br>
                <label for="bug">队伍故障:</label>
                <input type="text" name="bug" value="无">
                <br>
                <label for="cmt">队伍评价:</label>
                <input type="text" name="cmt" value="无">
                <br>
                <label for="hang">队伍现在rank</label>
                <input type="int" name="current_rank" value=0>
                <br>
                <input type="submit" name="upload" value="upload">
            </form>
    </fieldset>
</body>
</html>
