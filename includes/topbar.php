<?php include("db.php"); ?>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.html">MULTI SOURCE GLOBAL NETWORK Inc.</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <?php 
                        $datetoday = date('Y/m/d');

                        $select_notify = $con->query("SELECT * FROM notify WHERE lifespan<='$datetoday' AND status=1")or die($con->error());
                        if($select_notify->num_rows > 0){
                            $i = 0;
                            while($row_notify = mysqli_fetch_array($select_notify)){
                                $i++;

                                echo "<div class='round' id='bell-count' data-value='$i'><span class='label-count'>$i</span></div>";
                            }
                        }

                        ?>

                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">


                            <ul class="menu">
                                <li>
                                 <?php 


                                 $notify = $con->query("SELECT * FROM notify WHERE lifespan<='$datetoday' AND status=1 ORDER BY 1 DESC")or die($con->error());
                                 if($notify->num_rows > 0){
                                    $a = 0;
                                    while($rownotify = mysqli_fetch_array($notify)){

                                        $lsp = $rownotify['lifespan'];
                                        $date = date('Y/m/d');

                                        $dt = strtotime($date);
                                        $life = strtotime($lsp);
                                        $a++;


                                        ?>   
                                        <?php
function updater($value,$n_id){
    // Create connection
    $conn = new mysqli( 'localhost' , 'root' , '' ,'msgni_inventory');
    $value =mysqli_real_escape_string($conn,$value);
    $n_id =mysqli_real_escape_string($conn,$n_id);
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error());
    }   
    $sql = "UPDATE notify SET status=0 WHERE n_id='{$n_id}'";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error updating record: " . $conn->error();
    }
    $conn->close();
}   

if(isset($_POST['status'])){
    updater($_POST['status'],$_POST['n_id']);
}
?>
                                        <form action="" method="post">
                                            <input type="hidden" name="n_id" value="1" />           
                                            <input type="hidden" name="status" />
                                     

                                        <a>
                                            <button type="submit" style="border: 1px;text-align: justify;">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">desktop_windows</i>
                                                 <!--b style="color:black;text-align: left;"><?php echo $rownotify['n_name'];?></b-->
                                            </div>
                                           
                                            <div class="menu-info">
                                                <h4><?php echo $rownotify['message'];?></h4>
                                                <p>
                                                    <i class="material-icons">date_range</i>&nbsp;&nbsp;<?php echo $datetoday;?>
                                                </p>
                                            </div>
                                        </button>
                                        </a>
                                    </input>
                                           </form>

                                    <?php } }else{

                                        echo "<h5 align='center'>No Notifications for this day</h5>";
                                    } ?>
                                </li>

                            </ul>
                            
                        </li>
                            <!--li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li-->
                        </ul>
                    </li>

                    <!-- #END# Notifications -->
                   
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>