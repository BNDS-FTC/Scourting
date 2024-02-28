<?php
// 连接到 MySQL 数据库
$servername = "localhost";
$username = "admin";
$password = "wsa8hDAE2n4R56n5";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 处理用户登录
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 使用预处理语句防止 SQL 注入攻击
    $stmt = $conn->prepare('SELECT id, usr_name, password FROM login.usr_info WHERE usr_name = ?');

    // 检查 prepare 是否成功
    if (!$stmt) {
        die("错误：" . $conn->error);
    }

    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // 在验证登录信息后，如果成功登录，使用 header 函数重定向到下一个页面
    if ($row = $result->fetch_assoc()) {
        // Compare plaintext password
        if ($password === $row['password']) {
            setcookie("user", "$username", time()+3600);
            header("Location: list.php");
            exit(); // 确保重定向后代码不会继续执行
        } else {
            echo "登录失败，用户名或密码错误";
        }
    } else {
        echo "登录失败，用户名或密码错误";
    }
}

// 关闭数据库连接
$conn->close();
?>