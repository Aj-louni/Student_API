<?php

$connection=new mysqli("localhost","root","","student");
$statment=$connection->prepare("select * from users where number=?");
$statment->bind_param("s",$_POST["number"]);
$statment->execute();
$resultset=$statment->get_result();
if($resultset->num_rows==0)
{
     $statment=$connection->prepare("insert into users values(?,?,?,?,?)");
     $statment->bind_param("sssss", $_POST["firstname"],$_POST["lastname"],
     $_POST["number"],$_POST["email"],$_POST["password"]);
     $statment->execute();
     echo 1;
}
else
{
    echo 0;
}