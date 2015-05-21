<?php
require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>我的通訊錄</title>
    <!-- 載入所需的CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container theme-showcase" role="main">

      <header>
        <h1>我的通訊錄 <small>資料庫專題</small></h1>
      </header>

      <nav>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">電話簿列表</a></li>
                <li><a href="new.html">新增一筆資料</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </nav>

      <section>

        <?php
          try {
            $db = new PDO('mysql:dbname='.$DB_NAME.';host='.$DB_HOST.';port='.$DB_PORT.';charset=utf8', $DB_USER, $DB_PASS);
            $db_query = $db->query('SELECT * FROM `contact` ');
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>姓名</th>';
            echo '<th>電話</th>';
            echo '<th>Email</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // 抓取一筆資料
            while($row = $db_query->fetch()){
              echo '<tr>';

              echo '<th scope="row">'.$row['id'].'</th>';
              echo '<td>'.$row['name'].'</td>';
              echo '<td>'.$row['tel'].'</td>';
              echo '<td>'.$row['email'].'</td>';

              echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';

          } catch (PDOException $e) {
            echo '<p class="bg-warning">資料庫連接錯誤</p>';
          }
        ?>

      </section>

      <footer>
        <p>Copyright 2015</p>
      </footer>

    </div>

    <!-- 載入所需的JavaScript -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
