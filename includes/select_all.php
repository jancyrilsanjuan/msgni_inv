<?php

$con = new mysqli('localhost','root','','msgni_inventory') or die(mysql_error($con));

function selectce(){

	global $con;

$get_ce = $con->query("SELECT * FROM lobby_ce")or die($con->error);
 $row_ce = mysqli_fetch_array($get_ce);

                        $lifespan = $row_ce['lifespan'];

                        $today_date = date('Y/m/d');

                        $td = strtotime($today_date);
                        if ($lifespan == $td) {
            
                            	echo " <li>
                                   
                            	<a href='javascript:void(0);'>
                            <div class='icon-circle bg-light-green'>
                                                <i class='material-icons'>person_add</i>
                                            </div>
                                            <div class='menu-info'>
                                                <h4>Your Item is expired</h4>
                                                <p>
                                                    <i class='material-icons'>access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                            </a>
                                             </li>";
    }
   
    }

?>