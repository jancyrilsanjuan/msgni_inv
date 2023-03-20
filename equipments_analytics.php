<?php 

session_start();

include("config.php");

if(!isset($_SESSION['SESSION_EMAIL'])){

  echo "<script>window.open('index.html/index.php','_self')</script>";

}else{

  $email = $_SESSION['SESSION_EMAIL'];

  $getadmin = "SELECT * FROM admin WHERE email='$email'";
  $resadmin = mysqli_query($conn, $getadmin);
  mysqli_num_rows($resadmin);
  $rowadmin = mysqli_fetch_assoc($resadmin);

  $role = $rowadmin['role'];

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | MSGNI Inventory System</title>
  <!-- Favicon-->
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Colorpicker Css -->
  <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

  <!-- Dropzone Css -->
  <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

  <!-- Multi Select Css -->
  <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

  <!-- Bootstrap Spinner Css -->
  <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

  <!-- Bootstrap Tagsinput Css -->
  <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

  <!-- Bootstrap Select Css -->
  <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

  <!-- noUISlider Css -->
  <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="css/style.css" rel="stylesheet">

  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="css/themes/all-themes.css" rel="stylesheet" />
  
  <?php

  include("includes/topbar.php");

  include("includes/section.php");

  ?>

  <!-- Lobby OS -->
  <section class="content">
    <div class="container-fluid">
      <div class="block-header">
      </div>
      <div class="row clearfix">
        <!-- Line Chart -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <center><h2>Headphone Chart</h2></center>

            </div>
            <div class="body">
              <?php
              $connection = mysqli_connect('localhost','root','','msgni_inventory');
              if(isset($_POST['search'])) {
                $searchKey = $_POST['search'];
                $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
              }else
              $sql = "SELECT * FROM year_created";
              $result = mysqli_query($connection, $sql);
              ?>
              <form action="analytics/headphone/headphone.php" method="POST">
                <select name="search" required>
                  <option value="" hidden="">-- Select Year --</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2024">2025</option>
                </select>
                <button class="btn btn-danger"><i class="material-icons">search</i></button>
              </form>
              <?php  
              $connect = mysqli_connect("localhost", "root", "", "msgni_inventory");  
              $query = "SELECT year_created, count(*) as number FROM headphone GROUP BY year_created";  
              $result = mysqli_query($connect, $query);  
              ?> 
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <script type="text/javascript">
               google.charts.load("current", {packages:["corechart"]});
               google.charts.setOnLoadCallback(drawChart);
               function drawChart() {
                var data = google.visualization.arrayToDataTable([  
                  ['Year', 'Number'],  
                  <?php  
                  while($row = mysqli_fetch_array($result))  
                  {  
                   echo "['".$row["year_created"]."', ".$row["number"]."],";  
                 }  
                 ?>  
                 ]); 


                var options = {
                  title: '',
                  is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
              }
            </script>

            <!-- Lobby Os End -->

            <!-- Lobby Of -->
            <div id="piechart_3d" style="width: 450px; height: 320px;"></div>
            <div id="" class="graph"></div>
          </div>
        </div>
      </div>
      <!-- #END# Line Chart -->

      <!-- Bar Chart -->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <center><h2>Keyboard Chart</h2></center>

          </div>
          <div class="body">
            <?php
            $connection = mysqli_connect('localhost','root','','msgni_inventory');
            if(isset($_POST['search'])) {
              $searchKey = $_POST['search'];
              $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
            }else
            $sql = "SELECT * FROM year_created";
            $result = mysqli_query($connection, $sql);
            ?>
            <form action="analytics/keyboard/keyboard.php" method="POST">
              <select name="search" required>
                <option value="" hidden="">-- Select Year --</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2024">2025</option>
              </select>
              <button class="btn btn-danger"><i class="material-icons">search</i></button>
            </form>
            <?php
            $connection = mysqli_connect('localhost','root','','msgni_inventory');
            if(isset($_POST['search'])) {
              $searchKey = $_POST['search'];
              $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
            }else
            $sql = "SELECT * FROM year_created";
            $result = mysqli_query($connection, $sql);
            ?>

            <?php  
            $connect = mysqli_connect("localhost", "root", "", "msgni_inventory");  
            $query = "SELECT year_created, count(*) as number FROM keyboard GROUP BY year_created";  
            $result = mysqli_query($connect, $query);  
            ?>  
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Year', 'Number'],  
                  <?php  
                  while($row = mysqli_fetch_array($result))  
                  {  
                   echo "['".$row["year_created"]."', ".$row["number"]."],";  
                 }  
                 ?>  
                 ]);  
                var options = {
                  title: '',
                  pieHole: 0.4,
                };

                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                chart.draw(data, options);
              }
            </script>
            <div id="donutchart" style="width:450px; height: 320px;"></div>
            <div id="" class="graph"></div>
          </div>
        </div>
      </div>
      <!-- lobby of end -->

      <!-- Lobby CE -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
           <center><h2>Monitor Chart</h2></center>

         </div>
         <div class="body">
          <?php
          $connection = mysqli_connect('localhost','root','','msgni_inventory');
          if(isset($_POST['search'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
          }else
          $sql = "SELECT * FROM year_created";
          $result = mysqli_query($connection, $sql);
          ?>
          <form action="analytics/monitor/monitor.php" method="POST">
            <select name="search" required>
              <option value="" hidden="">-- Select Year --</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2024">2025</option>
            </select>
            <button class="btn btn-danger"><i class="material-icons">search</i></button>
          </form>
          <?php
          $connection = mysqli_connect('localhost','root','','msgni_inventory');
          if(isset($_POST['search'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
          }else
          $sql = "SELECT * FROM year_created";
          $result = mysqli_query($connection, $sql);
          ?>

          <?php  
          $connect = mysqli_connect("localhost", "root", "", "msgni_inventory");  
          $query = "SELECT year_created, count(*) as number FROM keyboard GROUP BY year_created";  
          $result = mysqli_query($connect, $query);  
          ?>  
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = google.visualization.arrayToDataTable([  
                ['Year', 'Number'],  
                <?php  
                while($row = mysqli_fetch_array($result))  
                {  
                 echo "['".$row["year_created"]."', ".$row["number"]."],";  
               }  
               ?>  
               ]); 

              var options = {
                title: '',
                vAxis: {title: 'Accumulated Rating'},
                isStacked: true
              };

              var chart = new google.visualization.SteppedAreaChart(document.getElementById('SteppedAreaChart'));

              chart.draw(data, options);
            }
          </script>
          <div id="SteppedAreaChart" style="width: 970px; height: 320px;"></div>
          <div id="" class="graph"></div>
        </div>
      </div>
    </div>
    <!-- #END# Donut Chart -->

    <!-- Lobby CS -->
    <div class="row clearfix">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
           <center><h2>Mouse Chart</h2></center>

         </div>
         <div class="body">
          <?php
          $connection = mysqli_connect('localhost','root','','msgni_inventory');
          if(isset($_POST['search'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
          }else
          $sql = "SELECT * FROM year_created";
          $result = mysqli_query($connection, $sql);
          ?>
          <form action="analytics/mouse/mouse.php" method="POST">
            <select name="search" required>
              <option value="" hidden="">-- Select Year --</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2024">2025</option>
            </select>
            <button class="btn btn-danger"><i class="material-icons">search</i></button>
          </form>
          <?php
          $connection = mysqli_connect('localhost','root','','msgni_inventory');
          if(isset($_POST['search'])) {
            $searchKey = $_POST['search'];
            $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
          }else
          $sql = "SELECT * FROM year_created";
          $result = mysqli_query($connection, $sql);
          ?>

          <?php  
          $connect = mysqli_connect("localhost", "root", "", "msgni_inventory");  
          $query = "SELECT year_created, count(*) as number FROM mouse GROUP BY year_created";  
          $result = mysqli_query($connect, $query);  
          ?>  
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
          <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
            var data = google.visualization.arrayToDataTable([  
              ['Year', 'Number'],  
              <?php  
              while($row = mysqli_fetch_array($result))  
              {  
               echo "['".$row["year_created"]."', ".$row["number"]."],";  
             }  
             ?>  
             ]);  
            var options = {
              title: '',
              hAxis: {title: '',  titleTextStyle: {color: '#333'}},
              vAxis: {minValue: 0}
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          } 
        </script>  
        <h3 align="center"></h3>  
        <div id="chart_div" style="width: 970px; height: 320px;"></div>  
        <div id="" class="graph"></div>
      </div>
    </div>
  </div>
  <!-- Lobby Cs End -->


  <!--  Lobby Na -->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="header">
       <center><h2>System Unit Chart</h2></center>

     </div>
     <div class="body">
      <?php
      $connection = mysqli_connect('localhost','root','','msgni_inventory');
      if(isset($_POST['search'])) {
        $searchKey = $_POST['search'];
        $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
      }else
      $sql = "SELECT * FROM year_created";
      $result = mysqli_query($connection, $sql);
      ?>
      <form action="analytics/system_unit/SU.php" method="POST">
        <select name="search" required>
          <option value="" hidden="">-- Select Year --</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2024">2025</option>
        </select>
        <button class="btn btn-danger"><i class="material-icons">search</i></button>
      </form>
      <?php
      $connection = mysqli_connect('localhost','root','','msgni_inventory');
      if(isset($_POST['search'])) {
        $searchKey = $_POST['search'];
        $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
      }else
      $sql = "SELECT * FROM year_created";
      $result = mysqli_query($connection, $sql);
      ?>

      <?php  
      $connect = mysqli_connect("localhost", "root", "", "msgni_inventory");  
      $query = "SELECT year_created, count(*) as number FROM system_unit GROUP BY year_created";  
      $result = mysqli_query($connect, $query);  
      ?>  
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([  
            ['Year', 'Numbers'],  
            <?php  
            while($row = mysqli_fetch_array($result))  
            {  
             echo "['".$row["year_created"]."', ".$row["number"]."],";  
           }  
           ?>  
           ]); 

          var options = {
            title: '',
            hAxis: {title: '',  titleTextStyle: {color: '#333'}},
            vAxis: {minValue: 0}
          };
          var chart = new google.visualization.AreaChart(document.getElementById('chart_div6'));
          chart.draw(data, options);
        }
      </script>
      <div id="chart_div6" style="width:  970px; height: 320px;"></div>
      <div id="" class="graph"></div>
    </div>
  </div>
</div>                
</div>
<!-- lobby NA end -->


<!-- Lobby CE -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="card">
    <div class="header">
     <center><h2>UPS Chart</h2></center>

   </div>
   <div class="body">
    <?php
    $connection = mysqli_connect('localhost','root','','msgni_inventory');
    if(isset($_POST['search'])) {
      $searchKey = $_POST['search'];
      $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
    }else
    $sql = "SELECT * FROM year_created";
    $result = mysqli_query($connection, $sql);
    ?>
    <form action="analytics/ups/ups.php" method="POST">
      <select name="search" required>
        <option value="" hidden="">-- Select Year --</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2024">2025</option>
      </select>
      <button class="btn btn-danger"><i class="material-icons">search</i></button>
    </form>
    <?php
    $connection = mysqli_connect('localhost','root','','msgni_inventory');
    if(isset($_POST['search'])) {
      $searchKey = $_POST['search'];
      $sql = "SELECT * FROM year_created WHERE Year LIKE '%$searchKey%'";
    }else
    $sql = "SELECT * FROM year_created";
    $result = mysqli_query($connection, $sql);
    ?>
    
    <?php  
    $connect = mysqli_connect("localhost", "root", "", "msgni_inventory");  
    $query = "SELECT year_created, count(*) as number FROM ups GROUP BY year_created";  
    $result = mysqli_query($connect, $query);  
    ?>  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
          ['Year', 'Number'],  
          <?php  
          while($row = mysqli_fetch_array($result))  
          {  
           echo "['".$row["year_created"]."', ".$row["number"]."],";  
         }  
         ?>  
         ]); 

        var options = {
          title : '',
          vAxis: {title: 'Rating'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>
    <div id="chart_div1" style="width: 970px; height: 320px;"></div>
    <div id="" class="graph"></div>
  </div>
</div>
</div>
<!-- #END# Donut Chart -->


</div>
</div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

<!-- Dropzone Plugin Js -->
<script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js 97-->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
  </body>

  </html>
  <?php } ?>