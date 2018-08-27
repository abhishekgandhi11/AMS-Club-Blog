<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

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
        <a class="navbar-brand" href="index.html">Nirma University</a>
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
              <a class="nav-link" href="ams_post.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="delete_post.php">Delete post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ams_event.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="delete_event.php">Delete Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ams_feedback.php">Feedback</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
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
        <div class="col-lg-10 col-md-12 mx-auto">
        <a>You can See All Blog and Delete Blog From Here..!</a>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="f1" method="post">
          
          <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Blog Id</label>
                <input type="text" class="form-control" placeholder="Blog id" name="post_id" id="post_id" required data-validation-required-message="Please enter Blog id.">
                <p class="help-block text-danger"></p>
              </div>
            </div>  
            <div class="control-group">
            <br>
            <div id="danger"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-danger" name="delete_p" >Delete Blog</button>
            </div>
            <br>
          </form>
          <?php
                require_once('connect.php');
                if(isset($_POST["delete_p"])){
                    $p_id = $_POST["post_id"];
                    $sql2 = "delete from post where p_id = $p_id";
                     if($conn->query($sql2)===TRUE){
                        echo "<div class='alert alert-success'>";
                            echo "<strong>Congratulation...! </strong> Post is Deleted.";
                        echo "</div>";

                     }
                     else{
                        echo "<div class='alert alert-danger'>";
                            echo "<strong>Alert..! </strong> Post is not Deted";
                        echo "</div>";
                     }
                }
                $sql = "select * from post order by p_id desc";
                //echo $sql;
                    $result = $conn->query($sql);
                        echo "<table class='table-striped'>";
                            echo "<tr align='center'>";
                                echo "<th>Blog_Id</th>";
                                echo "<th>Blog Title</th>";
                                echo "<th>Blog Date</th>";
                            echo "</tr>";
                        while($row = $result->fetch_assoc()){
                            echo "<tr align='left'>";
                                echo "<td>".$row["p_id"]."</td>";
                                echo "<td>".$row["p_title"]."</td>";
                                echo "<td>".$row["p_date"]."</td>";
                            echo "</tr>";
                         }
                         echo "</table>";
            ?>
          
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
            <p class="copyright text-muted">Nirma University 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>