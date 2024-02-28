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

// 获取比赛信息
$competitionQuery = "SELECT * FROM competitions";
$competitionResult = $conn->query($competitionQuery);

if ($competitionResult->num_rows > 0) {
    while ($competitionRow = $competitionResult->fetch_assoc()) {
        echo '<div class="competition-item">';
        echo '<div class="competition-header" onclick="toggleCompetitionDetails(' . $competitionRow["competition_id"] . ')">';
        echo '<span class="competition-id">' . $competitionRow["competition_id"] . '</span>';
        echo '<span class="competition-name">' . $competitionRow["competition_name"] . '</span>';
        echo '<span class="arrow">&#9654;</span>';
        echo '</div>';
        echo '<div id="competition-details-' . $competitionRow["competition_id"] . '" class="competition-details">';
        
        // 获取比赛的详细信息
        $competitionDataQuery = "SELECT * FROM competitions_data WHERE competition_id = " . $competitionRow["competition_id"];
        $competitionDataResult = $conn->query($competitionDataQuery);

        if ($competitionDataResult->num_rows > 0) {
            $competitionDataRow = $competitionDataResult->fetch_assoc();
            // 显示比赛详细信息
            echo '<p class="competition-description">' . $competitionDataRow["competition_description"] . '</p>';
        }

        // 获取该比赛的参赛队伍信息
        $teamQuery = "SELECT td.*, tf.*
        FROM teamsdata td
        LEFT JOIN team_features tf ON td.team_id = tf.team_id
        WHERE td.team_id = " . $competitionRow["team_id"];
        $teamResult = $conn->query($teamQuery);

        if ($teamResult->num_rows > 0) {
            while ($teamRow = $teamResult->fetch_assoc()) {
                echo '<div class="team-item">';
                echo '<div class="team-header" onclick="toggleDetails(' . $teamRow["team_id"] . ')">';
                echo '<span class="team-id">' . $teamRow["team_id"] . '</span>';
                echo '<span class="team-name">' . $teamRow["team_name"] . '</span>';
                echo '<span class="auto-score">Auto: ' . $teamRow["auto_score"] . '</span>';
                echo '<span class="manual-score">Manual: ' . $teamRow["manual_score"] . '</span>';
                echo '<span class="total-score">Total: ' . $teamRow["total_score"] . '</span>';
                echo '<div class="be-ally">是否考虑为同盟: <input type="checkbox" ' . ($teamRow["be_ally"] ? 'checked' : '') . ' onclick="event.stopPropagation(); updateBeAlly(' . $teamRow["team_id"] . ', this.checked)" /></div>';
                echo '<span class="arrow">&#9654;</span>';
                echo '</div>';
                echo '<div id="details-' . $teamRow["team_id"] . '" class="team-details">';
                echo '评价: ' . $teamRow["comments"] . '<br>';
                echo 'Intake实现: ' . $teamRow["intake_design"] . '<br>';
                echo '自动部分实现: ' . $teamRow["auto_design"] . '<br>';
                echo '飞机得分: ' . $teamRow["plane"] . '<br>';
                echo '爬升实现: ' . ($teamRow["climb"] ? '✅' : '❌') . '<br>';
                echo 'hp判罚分: ' . $teamRow["hp_penalty"] . '<br>';
                echo '可能出现的问题: ' . $teamRow["possible_bugs"] . '<br>';
                echo '更新时间: ' . $teamRow["update_date"] . '<br>';
                echo '图片: <img src="http://59.110.12.170/scouting/' . $teamRow["car_img_path"] . '"><br>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "未找到队伍数据";
        }

        echo '</div>';
        echo '</div>';
    }
} else {
    echo "未找到比赛数据";
}
?>



<script>
    function toggleDetails(teamId) {
    var details = document.getElementById('details-' + teamId);
    var arrow = details.previousElementSibling.querySelector('.arrow');

    if (details.style.display === 'block' || details.style.display === '') {
        details.style.display = 'none';
        arrow.innerHTML = '&#9654;';
    } else {
        details.style.display = 'block';
        arrow.innerHTML = '&#9660;';
    }
}

    
    function toggleCompetitionDetails(competitionId) {
    var details = document.getElementById('competition-details-' + competitionId);
    var arrow = details.previousElementSibling.querySelector('.arrow');

    if (details.style.display === 'block') {
        details.style.display = 'none';
        arrow.innerHTML = '&#9654;';
    } else {
        details.style.display = 'block';
        arrow.innerHTML = '&#9660;';
    }
}

    function updateBeAlly(teamId, isChecked) {
    // 使用 AJAX 发送 POST 请求到后端 PHP 文件
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_be_ally.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // 构建 POST 数据
    var data = "team_id=" + encodeURIComponent(teamId) + "&be_ally=" + encodeURIComponent(isChecked ? 1 : 0);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // 更新成功后的处理
            console.log(xhr.responseText);
        }
    };
    
    // 发送请求
    xhr.send(data);
    }
</script>
