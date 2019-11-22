<?php

$connection=new mysqli("localhost","root","","student");
$statment=$connection->prepare("select * from users where email=?");
$statment->bind_param("s",$_POST["email"]);
$statment->execute();
$resultset=$statment->get_result();
if($resultset->num_rows==0)
{
     $statment=$connection->prepare("insert into users values(?,?,?,?)");
     $statment->bind_param("sssss", $_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["password"]);
     $statment->execute();
     echo 1;
}
else
{
    echo 0;
}