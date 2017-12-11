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
  <link rel="stylesheet" type="text/css" href="http://localhost/style.css">
  <link rel="stylesheet" href="http://localhost/bootstrap-3.3.4-dist/css/bootstrap.min.css" >
</head>
<body id="target">
  <div class="container">
    <header class="jumbotron text-center">
        <img src="https://cdn-images-1.medium.com/max/653/1*wMZnVAEei1xbY1v6sAbYxQ.png"
        alt="javasctipt" class="img-circle" id="logo">
        <h1><a href="http://localhost/index.php">JavaScript</a></h1>
  </header>
  <div class="row">
    <nav class="col-md-3">
        <ol class="nav nav-pills nav-stacked">
    <?php
    while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
    }
    ?>
        </ol>
    </nav>
    <div class="col-md-9">
      <article>
        <form action="process.php" method="post">

          <div class="form-group">
             <label for="form-title">제목</label>
             <input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요">
           </div>

           <div class="form-group">
              <label for="form-author">작성자</label>
              <input type="text" class="form-control" name="author" id="form-title" placeholder="이름을 적어주세요">
            </div>

            <div class="form-group">
               <label for="form-description">본문</label>
               <textarea class="form-control" rows="10" name="description" id="form-author" placeholder="본문을 적어주세요."></textarea>
                </div>

          <input type="submit" name="name" class="btn btn-default">
        </form>
      </article>
      <hr>
        <div id="control">
        <div class="btn-group" role="group" aria-label="...">

          <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default"/>
          <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default"/>
        </div>
          <a href="http://localhost/write.php" class="btn btn-success">쓰기</a>
        </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
       <script src="http://localhost/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
      </div>
    </div>
  </div>

</body>
</html>
