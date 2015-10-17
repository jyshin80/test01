<?php
include('session.php');
?>
<?php
include('header.php');
 ?>
    <div class="row">

        <nav class="col-md-3">
          <ol class="nav nav-pills nav-stacked">
          <?php
          while( $row = mysqli_fetch_assoc($result)){
            echo '<li><a href="http://localhost:8080/list.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
          }
          ?>
          </ ol>
        </nav>
        <div class="col-md-9">

          <div id="profile">
          <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
          <b id="logout"><a href="logout.php">Log Out</a></b>
          </div>

          <article>
          <?php
          if(empty($_GET['id']) === false ) {
              $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo '<h2>'.htmlspecialchars($row['title']).'</h2>' ;
              echo '<p class="name">'.htmlspecialchars($row['name']).'</p>';
              echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
          }
          ?>
          </article>
          <hr>
          <div id="control">
            <div class="btn-group" role="group" aria-label="...">
              <input type="button" value="white" onclick="document.getElementById('target').className='white'" class="btn btn-default  btn-lg"/>
              <input type="button" value="black" onclick="document.getElementById('target').className='black'" class="btn btn-default btn-lg"/>
            </div>
            <a href="http://localhost:8080/write.php" class="btn btn-success  btn-lg">write</a>
            <?php
              if (empty ($_GET['id']) === false){
                echo '<a href="http://localhost:8080/delete.php?id='.$_GET['id'].'" class="btn btn-success btn-lg">delete</a>'."\n";
                echo '<a href="http://localhost:8080/update.php?id='.$_GET['id'].'" class="btn btn-success btn-lg">update</a>'."\n";
              }
             ?>
          </div>
        </div>
    </div>




<?php
include('footer.php');
 ?>
