<? include('config.php'); 
//$name 			=  md5(strip_tags($_POST['name'])) ;   echo $name.'<br>';
//$pas 			    = md5(strip_tags($_POST['pas'])); echo $pas.'<br>';  
$my_name 			= 'f0523bf35faf77235783d0f3e43762d2';
$my_pas 			= '7ce7547fe2922880ebc76ee68821b683'; 
   
 
 
if($_SESSION['admin'])
{
	echo '<meta charset="UTF-8"><style> body { background: url(back.png);  -moz-background-size: 100% auto;  -webkit-background-size: 100% auto; -o-background-size: 100% auto;  background-size: 100% auto;  }.in { width: 200px; left: 50%; top: 50%; position: absolute; transform: translate(-50%,-50%); color: ##111111;} .in a{color: ##111111;} a:hover{text-decoration: none;}   </style> 
		<div class="in">Вы уже авторизованы
	 <a href="logout.php" target="_blank">Выйти</a>
	</div>';     echo $refresh;
	  exit;
}
else
{ 
	if($_POST['send'])   
	{
		if( md5($my_name) == md5(md5(strip_tags($_POST['name'])) ) and  md5($my_pas) == md5(md5(strip_tags($_POST['pas'])) ) ) 
		{ 
			$info = 'Все верно'; $_SESSION['admin'] = 'Svetevev'; echo $refresh; 
		} 
		else 
		{ 
			$info = 'Что-то не верно'; 
			if($is_bot)
			{
				if($_COOKIE['_um_fl'] == '')  { $metka = '1'; $info .= ' 2 попытки осталось';}	
				if($_COOKIE['_um_fl'] == '1') { $metka = '2'; $info .= ' 1 попытка осталась';}
				if($_COOKIE['_um_fl'] == '2') {  echo '<meta charset="UTF-8"><style> .in { width: 158px; left: 50%; top: 50%; position: absolute; transform: translate(-50%,-50%); } </style> <div class="in">заблокировано</div>'; 
				exit;} 	else{  setcookie("_um_fl", $metka ,time()+60000000); }				
			}
		}	
	}	
}
if($_COOKIE['_um_fl'] == '2') {  echo '<meta charset="UTF-8"><style> .in { width: 158px; left: 50%; top: 50%; position: absolute; transform: translate(-50%,-50%); } </style> <div class="in">заблокировано</div>'; exit;}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Вход</title>
	<style>
body {
    background: url(blocks/back.png)no-repeat center center fixed;
    background-size: cover;
}
input {outline:none;}
		* {box-sizing: border-box;}
.transparent {
	position: absolute;
	 width: 500px;
	padding: 60px 50px;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}
 ::-webkit-input-placeholder { /* WebKit browsers */
   color:    white;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    white;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    white;
}
:-ms-input-placeholder { /* Internet Explorer 10+ */
   color:    white;
}
.form-inner {position: relative;}
.form-inner h3 {
  position: relative;
  margin-top: 0;
  color: white;
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
  font-size: 14px;
  text-transform: uppercase;
}
 
 
.form-inner input {
  display: block;
  width: 100%;
  padding: 0 15px;
  margin: 10px 0 15px;
  border-width: 0;
  line-height: 40px;
  border-radius: 20px;
  color: white;
  background: rgba(255,255,255,.2);
  font-family: 'Roboto', sans-serif;
}
 
.form-inner input[type="submit"] {background: #1762EE;}

.transparent {
animation:anim 1s;
animation-duration:2s;
}
@keyframes anim {
from {opacity: 0;}
to {opacity: 1;}
}

	</style>
</head>
<body>
	<form class="transparent" method="post">
	   <div class="form-inner">
	     <h3><? if($info) { echo  $info ; } else  {echo  "Войти" ; } ?> </h3> 
		<input type="text" name="name"   placeholder="имя" required>
		<input type="password"   name="pas" placeholder="пароль" required >
 
		<input  type="submit" name="send" value="Отправить">
	  </div>
	</form>
</body>
</html>
 

  