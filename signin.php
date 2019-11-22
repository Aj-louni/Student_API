<?php


$connection=new mysqli("localhost","root","","cupracarcarecenter");
$statment=$connection->prepare("select * from users where number=? and password=?");
$statment->bind_param("ss", $_POST["number"],$_POST["password"]);
$statment->execute();
$resultset=$statment->get_result();
if($resultset->num_rows==0)
    echo 0;
else
    echo 1;