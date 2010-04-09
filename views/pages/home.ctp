<h1>Versi—n Alpha</h1>



<?php

/*
-------------------------
Update ARO Ponentes
-------------------------
*/
/*
$num=11;
for($i = 4; $i <= 36; $i++) {
	$sql="SELECT id, username FROM users WHERE id='".$i."'";
	$query=mysql_query($sql);
	while(($user=mysql_fetch_array($query))!=null) {
		$foreign_key=$user['id'];
		$alias=$user['username'];
	}
	
	echo "INSERT INTO aros(parent_id,model,foreign_key,alias,lft,rght) VALUES('2','User','".$foreign_key."','".$alias."','".++$num."','".++$num."');";
}
	echo "UPDATE aros SET rght='".++$num."' WHERE id='1';";
*/
/*
-------------------------
Bulk Usuarios
-------------------------
*/

for($i = 1; $i < 2; $i++) {

	$password_length = 15;


  list($usec, $sec) = explode(' ', microtime());
  srand((float) $sec + ((float) $usec * 100000));


$alfa = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM&%^)(#@";
$token = "";
for($i = 0; $i < $password_length; $i ++) {
  $token .= $alfa[rand(0, strlen($alfa))];
}    
echo $token;


	$password = Security::hash($token);
	$state_id = 0;
	$school = "";
	$username = "";
	
	$schedule_id = "";
	$left = 0;
	$right = 0;
	
	
	echo "INSERT INTO users(id, name, username, passwd, email, state_id, school, registered, group_id, team_id, active, created, modified) VALUES('".$id."','".$username."','".$username."','".$password."','".$email."','".$state_id."','".$school."','1','1','".$team_id."','1',NOW(),NOW())";
	
	echo "INSERT INTO schedules_users(user_id,schedule_id) VALUES('".$i."','".$schedule_id."')";
	
	echo "INSERT INTO aros(model, foreign_key, alias, left,right) VALUES('User','".$i."','".$username."','".$left."','".$right."');";
}

?>