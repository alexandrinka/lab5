<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Лабораторная работа №5</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
div.log {
   margin-top: 250px;
   }
   
   .page-footer {
 background-color: #f1c40f;
 color: #2c3e50;
}
 
 .footer{
margin-top: 400px;
 margin-left:1200px;
}

</style>
</head>

<body link="#f1c40f" vlink="#ff8000" alink="#ff0800">
 

<?php 
	$name=$_POST['name'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$auto='';
	
	$password = md5($password."ah1f5hf6");
	
	$mysql = new mysqli ('localhost', 'root', 'root', 'registration');

$result = $mysql->query("SELECT * FROM `users` WHERE `name`='$name' AND `pass`='$password'");
$user = $result->fetch_assoc();

if ($user==''){
	$auto = 'Пользователь не найден :(';
}
else 
{
	$auto='Добро пожаловать :)';
}

$mysql->close();
?>

<div class="log">
<h1><?php echo $auto; ?></h1>
</div>

<footer class="page-footer">

<h2 class="footer"> <a href="index.php">Вернуться</a></h2>

</footer>

</body>
</html>