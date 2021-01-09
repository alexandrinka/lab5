<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Лабораторная работа №5</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
.error { border:2px solid red }
.warning {ont-size: 10px;
	color: grey;
	font-style:italic;}
	
.page-footer {
 background-color: #f1c40f;
 color: #2c3e50;
}
 
 .footer{
 margin-left:900px;
}
</style>
</head>

<body link="#f1c40f" vlink="#ff8000" alink="#ff0800">

<header>
        <h1>Лабораторная работа №5</h1>
    </header>
	
	<h2> Регистрационная форма</h2>

<?php 
	$name=$_POST['name'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$valid_name = ''; $valid_email = ''; $valid_password = '';
	$wN = ''; $wE = ''; $wP = '';
	
	
		
		if(empty($name))
		{
			$valid_name = 'error';
			$wN="*Поле не должно быть пустым";
		}
		
		if(empty($password))
		{
			$valid_password = 'error';
			$wP="*Поле не должно быть пустым";
		}
		
		
		if (empty($email))
		{
			$valid_email = 'error';
			$wE="*Поле не должно быть пустым";
		}
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$valid_email = 'error';
			$wE="*Неверный формат поля";
		}
	
	$password = md5($password."ah1f5hf6");
	
	$mysql = new mysqli ('localhost', 'root', 'root', 'registration');
$mysql->query("INSERT INTO `users` (`name`, `email`, `pass`) VALUES('$name','$email', '$password')");
$mysql->close();


?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
      <label for="name">Имя:</label><br>
      <input id="name" name="name" 
			value="<?php echo $_POST['name']; ?>"
            class="<?php echo $valid_name; ?>">
			<div class="warning"><?php echo $wN; ?></div>
      <label for="email">E-mail:</label><br>
      <input id="email" name="email" 
			value="<?php echo $_POST['email']; ?>"
            class="<?php echo $valid_email; ?>">
			<div class="warning"><?php echo $wE; ?></div>
			<label for="password">Пароль:</label><br>
      <input type="password" id="password" name="password" 
			value="<?php echo $_POST['password']; ?>"
            class="<?php echo $valid_password; ?>">
			<div class="warning"><?php echo $wP; ?></div><br>
  <input type="submit" class="b1" name="submit" value="Зарегистрироваться">
</form>



<footer class="page-footer">

<h2 class="footer"> <a href="index.php">Вернуться</a></h2>

</footer>
</body>
</html>













