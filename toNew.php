<?php
require_once 'config.php';

$inputName = $_POST['inputName'];
$inputTel = $_POST['inputTel'];
$inputEmail = $_POST['inputEmail'];
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>我的通訊錄</title>
    <!-- 載入所需的CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
                <li><a href="index.php">電話簿列表</a></li>
                <li class="active"><a href="new.html">新增一筆資料</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </nav>

      <section>

        <h2>你輸入的資料為</h2>
        <ul>
          <li><?php echo $inputName; ?></li>
          <li><?php echo $inputTel; ?></li>
          <li><?php echo $inputEmail; ?></li>
        </ul>

        <?php
          try {
            $db = new PDO('mysql:dbname='.$DB_NAME.';host='.$DB_HOST.';port='.$DB_PORT.';charset=utf8', $DB_USER, $DB_PASS);
            $sql = "INSERT INTO `mydb`.`contact` (`id`, `name`, `tel`, `email`) VALUES (NULL, '".$inputName."', '".$inputTel."', '".$inputEmail."');";
            $db->exec($sql);
            echo $sql;
            echo '<p class="bg-success">資料新增成功</p>';
          }
          catch (PDOException $e) {
            echo '<p class="bg-warning">資料新增失敗</p>';
          }
        ?>

      </section>

      <footer>
        <p>Copyright 2015</p>
      </footer>

    </div>

    <!-- 載入所需的JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
