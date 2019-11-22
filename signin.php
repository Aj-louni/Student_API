<?php


$connection=new mysqli("localhost","root","","student");
$statment=$connection->prepare("select * from users where email=? and password=?");
$statment->bind_param("ss", $_POST["email"],$_POST["password"]);
$statment->execute();
$resultset=$statment->get_result();
if($resultset->num_rows==0)
    echo 0;
else
    echo 1;