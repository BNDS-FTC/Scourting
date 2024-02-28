<div class="team-item">
    <div class="team-header" onclick="toggleDetails(<?php echo $row["team_id"]; ?>)">
        <span class="team-id"><?php echo $row["team_id"]; ?></span>
        <span class="team-name"><?php echo $row["team_name"]; ?></span>
        <span class="auto-score">Auto: <?php echo $row["auto_score"]; ?></span>
        <span class="manual-score">Manual: <?php echo $row["manual_score"]; ?></span>
        <span class="total-score">Total: <?php echo $row["total_score"]; ?></span>
        <span class="arrow">&#9654;</span>
    </div>
    <div id="details-<?php echo $row["serial_number"]; ?>" class="team-details">
        评价: <?php echo $row["comments"]; ?><br>
        Intake实现: <?php echo $row["which_intake"]; ?>, <?php echo $row["intake_design"]; ?><br>
        自动部分: <?php echo $row["which_auto"]; ?>, <?php echo $row["auto_design"]; ?><br>
        飞机得分: <?php echo $row["plane"]; ?><br>
        爬升实现: <?php echo ($row["climb"] ? '✅' : '❌'); ?><br>
        判罚分: <?php echo $row["penalty"]; ?><br>
        可能出现的问题: <?php echo $row["possible_bugs"]; ?><br>
        这场比赛后的rank: <?php echo $row["current_rank"]; ?><br>
        更新时间: <?php echo $row["update_date"]; ?><br>
        <b>记录流水号:</b> <?php echo $row["serial_number"]; ?><br>
        图片: <img src="/scouting/<?php echo $row["car_img_path"]; ?>"><br>
    </div>
</div>

<script>
    function toggleDetails(serialNumber) {
        var details = document.getElementById('details-' + serialNumber);
        var arrow = details.previousElementSibling.querySelector('.arrow');
        if (details.style.display === 'block') {
            details.style.display = 'none';
            arrow.innerHTML = '&#9654;';
        } else {
            details.style.display = 'block';
            arrow.innerHTML = '&#9660;';
        }
    }
</script>
