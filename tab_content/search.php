<html>
    <head>
        <meta charset="utf-8" />
        <title>FTC-36920</title>
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <link rel="stylesheet" href="css/all_data_tab.css">
    </head>
    <body>
        <h1>Search Amoung 36920 Data Base</h1>
        <fieldset>
            <legend>搜索结果</legend>
            <?php
                if(!isset($_POST['search']) || $_POST['search'] == "") {
                    header("Location: search_frontpage.php");
                }
                // 数据库连接配置
                $servername = "localhost";
                $username = "admin";
                $password = "wsa8hDAE2n4R56n5";
                $dbname = "login";
                $search = $_POST['search'];
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
                $count = 0;
                $count_suitable = 0;
                // 检查查询结果
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if(strpos($row["team_id"], $search) !== false || strpos($row["team_name"], $search) !== false) {
                            $count_suitable++;
                            include 'team_display.php';
                        }
                        $count++;
                    }
                    echo "查找到".$count_suitable."个符合条件的结果<br>";
                } else {
                    echo "未找到团队数据<br>";
                }
                echo "从".$count."个队伍中查找";
                // 关闭数据库连接
                $conn->close();
            ?>
        </fieldset>
    </body>
</html>
