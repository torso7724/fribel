<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"],$config["duser"],
$config["dpw"],$config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="/style.css">
  <link rel="stylesheet" href="/bootstrap-3.3.4-dist/css/bootstrap.min.css" >
</head>
<body id="target">
  <div class="container">
    <header class="jumbotron text-center">
        <img src="https://cdn-images-1.medium.com/max/653/1*wMZnVAEei1xbY1v6sAbYxQ.png"
        alt="javasctipt" class="img-circle" id="logo">
        <h2><a href="/index.php">Javascript</a></h2>
  </header>
  <div class="row">
    <nav class="col-md-3">
        <ol class="nav nav-pills nav-stacked">
    <?php
    while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="/index.php?id='.$row['id'].'">'
      .htmlspecialchars($row['title']).'</a></li>'."\n";
    }
    ?>
        </ol>
    </nav>
    <div class="col-md-9">
      <article>
      <?php
      if(empty($_GET['id']) === false ) {
          $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
          echo '<p>'.htmlspecialchars($row['name']).'</p>';
          echo strip_tags($row['description'],'<a><h1><h2><h3><h4><ul><ol><li>');
      }
      ?>
      </article>
      <hr>
        <div id="control">
        <div class="btn-group" role="group" aria-label="...">
          <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default"/>
          <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default"/>
        </div>
          <a href="/write.php" class="btn btn-success">쓰기</a>
        </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
       <script src="/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
      </div>
    </div>
  </div>

</body>
</html>
