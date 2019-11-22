<?php

$pwd = sha1($_POST["password"]);

$connection=new mysqli("localhost","root","","student");
$statment=$connection->prepare("select * from users where email=?");
$statment->bind_param("s",$_POST["email"]);
$statment->execute();
$resultset=$statment->get_result();
if($resultset->num_rows==0)
{
     $statment=$connection->prepare("insert into users values(?,?,?,?)");
     $statment->bind_param("ssss", $_POST["first_name"],$_POST["last_name"],$_POST["email"],$pwd);
     $statment->execute();
     echo 1;
}
else
{
    echo 0;
}