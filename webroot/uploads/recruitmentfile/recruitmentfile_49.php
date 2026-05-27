<?php
include("database.php"); 
$act=$_REQUEST['act'];

switch($act)
{
case 'registration':$name=$_REQUEST['textfield'];
                    $passwd=base64_encode(base64_encode($_REQUEST['textfield2']));
                    $class=$_REQUEST['textfield3'];
                    $roll=$_REQUEST['textfield4'];
                    $sec=$_REQUEST['textfield5'];
                    $result = mysql_query("INSERT INTO student(name,passwd,class,roll,sec) VALUES('".$name."','".$passwd."', '".$class."','".$roll."','".$sec."')");
                    if (!$result) {
                        die('Invalid query: ' . mysql_error());
                                  }
                    echo 'another row is created';
                    exit();
					break;					
case 'login': $id=$_REQUEST['txtuserid'];
              $passwd=$_REQUEST['txtpasswd'];
			  $sql="SELECT * FROM `student` WHERE `id`='".$id."' AND `passwd`='".$passwd."'";
              $result = mysql_query($sql);
              if (!$result){
                     die('Invalid query: ' . mysql_error());
                            }
			  session_start();
			  session_register(id);
			  $_SESSION['id']=$id;
			 /* session_unregister(id);*/
			  header("Location: signin.php");
			  exit();
			  break;
}
?> 