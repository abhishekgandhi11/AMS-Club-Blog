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
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Please Write Event From Here..!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
         
          <form name="sentMessage"  method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Event Title</label>
                <input type="text" class="form-control" placeholder="Event Title" name="event_title" id="event_title" required data-validation-required-message="Please enter Event Title.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Event Details</label>
                <textarea rows="05" class="form-control" placeholder="Write Your Event detail Here" name="detail" id="detail" required data-validation-required-message="Please Write Event detail."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Event Date (DD/MM/YYYY)</label>
                <input type="text" class="form-control" placeholder="Event Date(DD/MM/YYYY)" name="event_date" id="event_date" required data-validation-required-message="Please enter Event date.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Expire Date (DD/MM/YYYY)</label>
                <input type="text" class="form-control" placeholder="Expire Date(DD/MM/YYYY)" name="expire_date" id="expire_date" required data-validation-required-message="Please enter Event expire date.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="submit" >Publish Event</button>
            </div>            
            <br>
            <?php
                if(isset($_POST["submit"])){
                    require_once('connect.php');
                    date_default_timezone_set("Asia/Kolkata");
                    $date = date("d/m/Y h:i:sa");
                    $event_title = $_POST['event_title'];
                    $event_detail = $_POST['detail'];
                    $event_date = $_POST['event_date'];
                    $expire_date = $_POST['expire_date'];
                    echo "Title length :".strlen($event_title)." chars.<br>";
                    echo "Event length :".strlen($event_detail)." chars.";
                    if(strlen($event_title)>50){
                        echo "<div class='alert alert-danger'>";
                            echo "<strong>Alert..!</strong>Event Title Must be less than 50 chars.";
                        echo "</div>";
                    }
                    else if(strlen($event_detail)>500){
                        echo "<div class='alert alert-danger'>";
                            echo "<strong>Alert..!</strong>Event Must be less than 500 chars.";
                        echo "</div>";
                    }
                    else{
                        $sql = "insert into event (event_title,detail,date_of_post,event_date,expire_date) values('$event_title','$event_detail','$date','$event_date','$expire_date')";
                        if($conn->query($sql)===TRUE){
                            echo "<div class='alert alert-success'>";
                                echo "<strong>Congratulation..! </strong> Event is Published.";
                            echo "</div>";
                        }
                        else{
                            echo "<div class='alert alert-danger'>";
                                echo "<strong>Alert..!</strong> Event is not Published.";
                            echo "</div>";
                        } 
                    }
                }
            ?>
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