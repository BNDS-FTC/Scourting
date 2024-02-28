<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='initial-scale=1, viewport-fit=cover'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scouting SYS for 36920</title>
    <link rel="stylesheet" href="css/list_page.css">
</head>

<body>
    <h1>Scouting SYS for 36920</h1>

    <?php
    $activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'tab1';
    ?>
    
    <?php 
        if(isset($_COOKIE["user"])){
            echo '<div class="welcome-message">欢迎 ' . $_COOKIE["user"] . '</div>';
        } else {
            echo '<div class="welcome-message">游客，请您 <a href="/scouting/index.php">登录</a></div>';
        } 
    ?>
    
    <div class="container">
        <form method="POST" action="tab_content/search.php" class="parent">
            <input type="text" class="search" name="search" placeholder="搜索队伍编号或名字">
            <input type="submit" name="" id="" class="btn" value="搜索">
        </form>
    </div>
    
    
    <ul id="tabs">
        <li><a href="#tab1" <?php echo ($activeTab === 'tab1') ? 'class="active"' : ''; ?>>比赛记录</a></li>
        <li><a href="#tab2" <?php echo ($activeTab === 'tab2') ? 'class="active"' : ''; ?>>重点观察队伍</a></li>
        <li><a href="#tab3" <?php echo ($activeTab === 'tab3') ? 'class="active"' : ''; ?>>黑名单队伍</a></li>
        <li><a href="#tab4" <?php echo ($activeTab === 'tab4') ? 'class="active"' : ''; ?>>上传队伍</a></li>
        <li><a href="#tab5" <?php echo ($activeTab === 'tab5') ? 'class="active"' : ''; ?>>删除记录</a></li>
    </ul>

    <div id="tab1" class="tab <?php echo ($activeTab === 'tab1') ? 'active' : ''; ?>">
        <?php include 'tab_content/all_data.php'; ?>
    </div>
    
    <div id="tab2" class="tab <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>">
        <?php include 'tab_content/important_teams.php'; ?>
    </div>
    
    <div id="tab3" class="tab <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>">
        <?php include 'tab_content/blacklist_teams.php'; ?>
    </div>
    
    <div id="tab4" class="tab <?php echo ($activeTab === 'tab4') ? 'active' : ''; ?>">
        <?php 
        if(isset($_COOKIE["user"])){
            echo "<a href=\"tab_content/upload.php\"><br><button>上传队伍</button></a>";
        }else{
            echo "游客，请您<a href=\"/scouting/index.php\">登录</a>";
        } 
        ?>
    </div>
    
    <div id="tab5" class="tab <?php echo ($activeTab === 'tab5') ? 'active' : ''; ?>">
        <?php 
        if(isset($_COOKIE["user"])){
            echo "<a href=\"/scouting/tab_content/delete.php\"><br><button>删除记录</button></a>";
        }else{
            echo "游客，请您<a href=\"/scouting/index.php\">登录</a>";
        } 
        ?>
    </div>
    
    <script>
        // 获取选项卡链接和选项卡内容的元素
        var tabs = document.getElementById('tabs');
        var tabContents = document.querySelectorAll('.tab');

        // 为选项卡链接添加点击事件处理程序
        tabs.addEventListener('click', function (event) {
            if (event.target.tagName === 'A') {
                // 阻止默认链接行为
                event.preventDefault();

                // 获取目标选项卡 ID
                var targetTabId = event.target.getAttribute('href').substring(1);

                // 隐藏所有选项卡内容
                tabContents.forEach(function (tab) {
                    tab.classList.remove('active');
                });

                // 显示目标选项卡内容
                document.getElementById(targetTabId).classList.add('active');
            }
        });
    </script>
</body>
</html>
