<?php
// 数据库连接配置
$servername = "localhost";
$username = "admin";
$password = "wsa8hDAE2n4R56n5";
$dbname = "login";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接数据库失败: " . $conn->connect_error);
}

// 查询 teamsdata 表中的数据
$sql = "SELECT td.*, tf.* FROM teamsdata td
        LEFT JOIN team_features tf ON td.serial_number = tf.serial_number";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        include 'team_display.php';
    }
} else {
    echo "未找到团队数据";
}

$conn->close();
?>
<link rel="stylesheet" href="css/all_data_tab.css">