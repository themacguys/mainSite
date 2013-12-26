<?php

function stripZeros($a){
	$s = str_split($a);
	$r ='';
	for($i = 0; $i<strlen($a); $i++){
		if(!($s[$i] == '0' and $i%2==0)){
			$r.=$s[$i];
		}
	}
	return $r;
}
function logOut(){
session_destroy();
}
function printSuccess(){

	switch ($_GET['content']){
	
		case 'sales':
			include('sales');
		break;

		case 'intelligence':
			include('intelligence');
		break;
	
		case 'staff':
			include('staff');
		break;

		case 'profile':
			include('profile');
		break;

		default:
			include('sales');
		break;	
	}
}

function printFail($p){
	print '
<body>
<div id="login_header"><img src="images/login_header.png" /></div>

<div id="login_content">
	<form action="index.php" method="post" class="login_form">
 		<div class="label">PIN:</div>		<input type="hidden" name="next" value="">
     	<input type="password" name="pin" onclick="window.scrollTo(0, 60);">
     	<input type="hidden" name="next" value=""><br />
     	<input type="submit" name="login" value="Login" class="login_btn">
     </form>
 	
 	<div id="login_logo"><img src="images/login_logo.png" /></div>
</div>
 </body>
	';
}
session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /w>
<meta name="viewport" content="initial-scale=2.3, user-scalable=no" />
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />


<title>LightSpeed iPhone Stats</title>

<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/styles.css" type="text/css"/>

<script src="js/script.js" type="text/javascript" ></script>

</head>
<?php

if(isset($_SESSION['pin']) && '' != isset($_SESSION['pin']) ){
	$pin = $_SESSION['pin'];
}else{
	$pin = md5($_POST['pin']);
}
if('logout'==$_GET['content']){
logOut();
unset($pin);
}
switch ($pin) {
	case 'd41d8cd98f00b204e9800998ecf8427e':
	
		session_register('pin');
		$_SESSION['pin'] = $pin;
	
		printSuccess();
	break;
	
	default:
		printFail($pin);
	break;
}

?></html>
