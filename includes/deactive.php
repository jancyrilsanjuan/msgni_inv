<?php
    include('db.php');
    $ids = array();
    // $ids = implode(",",$_POST["id"]);
    $ids = $_POST["id"];
    
    
    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = $con->query("UPDATE notify SET status=0 where id= ".$ids."")or die($con->error());
    
   

?>