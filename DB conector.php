<?php
 $link = mysqli_connect('localhost', 'mysql_user', 'mysql_password');  
if (!$link){
 die('Not connected : '. mysqli_error($link));
 }
 //make library the current db
 $db_selected =mysqli_select_db($link,‘library');
 if (!$db_selected){
 die ('Can't use library : '. mysqli_error($link));
 }
 ?>