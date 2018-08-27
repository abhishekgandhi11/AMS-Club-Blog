<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AMS CLUB BLOG</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Association of MCA Students</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="feedback.php">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/blog_home.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>AMS Club</h1>
              <span class="subheading">Association of MCA Students</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <form name="f1" method="post">
            <?php
                require_once('connect.php');
                $sql = "select * from post order by p_id desc";
                $result = $conn->query($sql);
                $cnt = 1;
                echo "<div class='card container'>";   
                while($row = $result->fetch_assoc()){
                    echo "<div class='container'>";
                    //echo "<img class='card-img-top' src='img_avatar1.png' alt='Card image'>";
                        echo "<div class='card-body'>";
                            $id=$row["p_id"];
                            echo "<h3 class='card-title'>". $row["p_title"] ."</h3>";
                            echo "<p class='card-text'> Posted By: <b>President</b> on ".$row["p_date"]."</p>";
                            echo "<a href='read_more.php?id=$id' class='btn btn-primary'>Read Blog</a>";
                        echo "</div>";
                    echo "</div>";
                  echo "<hr>";
                  $cnt++;
                  if($cnt>10){
                      break;
                  }
                }
                echo "</div>";
            ?>
          </form>
    
          <!-- Pager -->
        </div>
        <!-- <div class="col-lg-1 col-md-1 mx-auto">
        </div> -->
        <div class="col-lg-4 col-md-4 mx-auto">
        <form name="f1" method="post">
            <?php
                require_once('connect.php');
                $sql = "select * from event order by event_id desc";
                $result = $conn->query($sql);
                  echo "<div  class='card' align='center'>";
                    echo "<br>";
                    $cnt=1;
                   while($row = $result->fetch_assoc()){
                    date_default_timezone_set("Asia/Kolkata");
                    $today = date("d/m/Y");
                    if($row["event_date"]==$today){
                      echo "<div class='card'  style='width:300px'>";
                      //echo "<img class='card-img-top' src='img_avatar1.png' alt='Card image'>";
                          echo "<div class='card-body'>";
                              $id=$row["event_id"];
                              echo "Event on today";
                              echo "<h4 class='card-title'>". $row["event_title"] ."</h4>";
                              echo "<p class='card-text'>Event on : ".$row["event_date"]."</p>";
                              echo "<a href='read_event.php?id=$id' class='btn btn-primary'>Read Event</a>";
                          echo "</div>";
                          echo "</div>";  
                    }
                    else if($row['expire_date']==$today){
                              $e_id =$row['event_id'];
                                $sql = "select * from event where event_id=$e_id";
                                //echo $sql;
                                  $result = $conn->query($sql);
                                  $event_id;
                                  $event_title;
                                  $detail;
                                  $event_date;
                                  while($row = $result->fetch_assoc()){
                                      $event_id =$row["event_id"];
                                      $event_title = $row["event_title"] ."<br>";
                                      $detail = $row["detail"] . "<br>";
                                      $event_date = $row["event_date"];
                                  }
                                  date_default_timezone_set("Asia/Kolkata");
                                  $date = date("d/m/Y h:i:sa");
                                  $sql1 = "insert into expire_event(event_title,detail,event_date) values('$event_title','$detail','$event_date')";
                                  if($conn->query($sql1)===TRUE){ 
                                  $sql2 = "delete from event where event_id = $event_id";
                                  if($conn->query($sql2)===TRUE){
                                      // echo "<div class='alert alert-success'>";
                                      //     echo "<strong>Meaasge...! </strong>Event is Deleted.";
                                      // echo "</div>";
              
                                  }
                                  else{
                                      echo "<div class='alert alert-danger'>";
                                          echo "<strong>Alert..! </strong> Event is copied in expire event but not deleted from event.";
                                      echo "</div>";
                                  }   
                                  }
                                  else{
                                      echo "<div class='alert alert-danger'>";
                                          echo "<strong>Alert..! </strong>".$user_name." Event is not deleted.";
                                      echo "</div>";
                                  } 
                      }
                    else{
                      echo "<div class='card'  style='width:300px'>";
                        //echo "<img class='card-img-top' src='img_avatar1.png' alt='Card image'>";
                        echo "<div class='card-body'>";
                            $id=$row["event_id"];
                            echo "<h4 class='card-title'>". $row["event_title"] ."</h4>";
                            echo "<p class='card-text'>Event on : ".$row["event_date"]."</p>";
                            echo "<a href='read_event.php?id=$id' class='btn btn-primary'>Read Event</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "<br>";
                  
                }
                echo "</div>";
            ?>
          </form>
          <hr>
          <!-- Pager -->
        </div>
        
      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">AMS CLUB 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
