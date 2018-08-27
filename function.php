<?php
    
    function post(){
        require_once('connect.php');
        $sql = "select * from post order by p_id desc";
        $result = $conn->query($sql);
        $cnt =1;
           while($row = $result->fetch_assoc()){
            echo "<div class='card' style='width:700px'>";
            //echo "<img class='card-img-top' src='img_avatar1.png' alt='Card image'>";
                echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>". $row["p_title"] ."</h3>";
                    echo "<p class='card-text'> Posted By: <b>President</b> on ".$row["p_date"]."</p>";
                    echo "<a href='read_more.php' name='" .$row["p_id"]. "' class='btn btn-primary'>Read Blog</a>";
                echo "</div>";
            echo "</div>";
          echo "<hr>";
          $cnt++;
          if($cnt>2){
              break;
          }

        }
    } 
    function event(){
        require_once('connect.php');
        $sql = "select * from event";
        $result = $conn->query($sql);
        $cnt =1;
           while($row = $result->fetch_assoc()){
            echo "<div class='card' style='width:200px'>";
                echo "<div class='card-body'>";
                    echo "<h3 class='card-title'>". $row["event_title"] ."</h3>";
                    echo "<p class='card-text'> Posted By: <b>President</b> on ".$row["event_date"]."</p>";
                   // echo "<a href='read_more.php' name=".$row["event_id"]." align='right' class='btn btn-primary'>Read Blog</a>";
                echo "</div>";
            echo "</div>";
          echo "<hr>";
           $cnt++;
          if($cnt>2){
              break;
          }

        }
    } 
?>