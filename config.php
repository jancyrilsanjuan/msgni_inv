<?php

$conn = mysqli_connect("localhost", "root", "", "msgni_inventory");

if (!$conn) {
    echo "Connection Failed";
}