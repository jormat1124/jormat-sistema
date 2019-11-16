

<?php include("frontend/header.php"); ?>
<?php  if(!isset($_SESSION['rol'])) {header('location: login.php');}?>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <div class="carousel-inner">
    <div class="carousel-item active">
    <center><br><br><img src="image/trabajo.jpg" width="800" height="500" alt="Los Angeles">></center>
    </div>
    <div class="carousel-item">
    <center><br><br><img src="image/trabajo3.jpg" width="800" height="500" alt="Los Angeles">></center>
    </div>
    <div class="carousel-item">
    <center><br><br><img src="image/trabajo2.jpg" width="800" height="500" alt="Los Angeles">></center>
    </div>
  </div>
  </div>
    <div class="carousel-item">
    <center><br><br><img src="image/trabajo2.jpg" width="800" height="500" alt="Los Angeles">></center>
    </div>
  </div>


  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>




<?php include ("frontend/footer.php")?>

