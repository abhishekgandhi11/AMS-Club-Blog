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
              <a class="nav-link" href="admin_user_form.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="delete_account.php">Current User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="existing_user.php">Existing User</a>
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
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Delete President Account by Click on Delete Button..!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <?php
                require_once('connect.php');
                $sql = "select * from user_info where user_id!=6";
                //echo $sql;
                    $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "User Id   :   ".$row["user_id"] ."<br>";
                            echo "User name :    " . $row["user_name"] ."<br>";
                            echo "Email id  :    " . $row["email_id"] . "<br>";
                            echo "Date  :   " .  $row["date"] . "<br>";
                            echo "Year  :   " . $row["year"];
                        }
                if(isset($_POST["delete_p"])){
                    $sql = "select * from user_info where user_id!=6";
                  //echo $sql;
                    $result = $conn->query($sql);
                    $user_id;
                    $user_name;
                    $email_id;
                    $year;
                    while($row = $result->fetch_assoc()){
                        $user_id =$row["user_id"];
                        $user_name = $row["user_name"] ."<br>";
                        $email_id = $row["email_id"] . "<br>";
                        $year = $row["year"];
                    }
                    date_default_timezone_set("Asia/Kolkata");
                    $date = date("d/m/Y h:i:sa");
                    $sql1 = "insert into existing_user(e_name,email_id,year,date) values('$user_name','$email_id',$year,'$date')";
                    if($conn->query($sql1)===TRUE){ 
                     $sql2 = "delete from user_info where user_id = $user_id";
                     if($conn->query($sql2)===TRUE){
                        echo "<div class='alert alert-success'>";
                            echo "<strong>Congratulation...! </strong>". $user_name ." User  Account is Deleted.";
                        echo "</div>";

                     }
                     else{
                        echo "<div class='alert alert-danger'>";
                            echo "<strong>NO..! </strong>" . $user_name ." User Account is copied in existing user but not deleted from user_info.";
                        echo "</div>";
                     }   
                    }
                    else{
                        echo "<div class='alert alert-danger'>";
                            echo "<strong>NO..! </strong>".$user_name." User Account is not deleted.";
                        echo "</div>";
                    }  
                }
            ?>
          <form name="sentMessage"  method="post">
            <div class="control-group">
            <br>
            <div id="danger"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-danger" name="delete_p" >Delete President Account</button>
            </div>
            <br>
          </form>
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

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>